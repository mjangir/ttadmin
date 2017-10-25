<?php
/**
 * CodeIgniter.
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 *
 * @link	http://codeigniter.com
 * @since	Version 3.0.0
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * CodeIgniter Redis Caching Class.
 *
 * @category   Core
 *
 * @author	   Anton Lindqvist <anton@qvister.se>
 *
 * @link
 */
class CI_Cache_redis extends CI_Driver
{
    /**
     * Default config.
     *
     * @static
     *
     * @var array
     */
    protected static $_default_config = [
        'socket_type' => 'tcp',
        'host'        => '127.0.0.1',
        'password'    => null,
        'port'        => 6379,
        'timeout'     => 0,
    ];

    /**
     * Redis connection.
     *
     * @var Redis
     */
    protected $_redis;

    /**
     * An internal cache for storing keys of serialized values.
     *
     * @var array
     */
    protected $_serialized = [];

    // ------------------------------------------------------------------------

    /**
     * Class constructor.
     *
     * Setup Redis
     *
     * Loads Redis config file if present. Will halt execution
     * if a Redis connection can't be established.
     *
     * @see		Redis::connect()
     */
    public function __construct()
    {
        $config = [];
        $CI = &get_instance();

        if ($CI->config->load('redis', true, true)) {
            $config = $CI->config->item('redis');
        }

        $config = array_merge(self::$_default_config, $config);
        $this->_redis = new Redis();

        try {
            if ($config['socket_type'] === 'unix') {
                $success = $this->_redis->connect($config['socket']);
            } else {
                // tcp socket

                $success = $this->_redis->connect($config['host'], $config['port'], $config['timeout']);
            }

            if (!$success) {
                throw new RuntimeException('Cache: Redis connection failed. Check your configuration.');
            }
        } catch (RedisException $e) {
            throw new RuntimeException('Cache: Redis connection refused ('.$e->getMessage().')');
        }

        if (isset($config['password']) && !$this->_redis->auth($config['password'])) {
            throw new RuntimeException('Cache: Redis authentication failed.');
        }

        // Initialize the index of serialized values.
        $serialized = $this->_redis->sMembers('_ci_redis_serialized');
        empty($serialized) or $this->_serialized = array_flip($serialized);
    }

    // ------------------------------------------------------------------------

    /**
     * Get cache.
     *
     * @param	string	Cache ID
     *
     * @return mixed
     */
    public function get($key)
    {
        $value = $this->_redis->get($key);

        if ($value !== false && isset($this->_serialized[$key])) {
            return unserialize($value);
        }

        return $value;
    }

    // ------------------------------------------------------------------------

    /**
     * Save cache.
     *
     * @param string $id   Cache ID
     * @param mixed  $data Data to save
     * @param int    $ttl  Time to live in seconds
     * @param bool   $raw  Whether to store the raw value (unused)
     *
     * @return bool TRUE on success, FALSE on failure
     */
    public function save($id, $data, $ttl = 60, $raw = false)
    {
        if (is_array($data) or is_object($data)) {
            if (!$this->_redis->sIsMember('_ci_redis_serialized', $id) && !$this->_redis->sAdd('_ci_redis_serialized', $id)) {
                return false;
            }

            isset($this->_serialized[$id]) or $this->_serialized[$id] = true;
            $data = serialize($data);
        } elseif (isset($this->_serialized[$id])) {
            $this->_serialized[$id] = null;
            $this->_redis->sRemove('_ci_redis_serialized', $id);
        }

        return $this->_redis->set($id, $data, $ttl);
    }

    // ------------------------------------------------------------------------

    /**
     * Delete from cache.
     *
     * @param	string	Cache key
     *
     * @return bool
     */
    public function delete($key)
    {
        if ($this->_redis->delete($key) !== 1) {
            return false;
        }

        if (isset($this->_serialized[$key])) {
            $this->_serialized[$key] = null;
            $this->_redis->sRemove('_ci_redis_serialized', $key);
        }

        return true;
    }

    // ------------------------------------------------------------------------

    /**
     * Increment a raw value.
     *
     * @param string $id     Cache ID
     * @param int    $offset Step/value to add
     *
     * @return mixed New value on success or FALSE on failure
     */
    public function increment($id, $offset = 1)
    {
        return $this->_redis->incr($id, $offset);
    }

    // ------------------------------------------------------------------------

    /**
     * Decrement a raw value.
     *
     * @param string $id     Cache ID
     * @param int    $offset Step/value to reduce by
     *
     * @return mixed New value on success or FALSE on failure
     */
    public function decrement($id, $offset = 1)
    {
        return $this->_redis->decr($id, $offset);
    }

    // ------------------------------------------------------------------------

    /**
     * Clean cache.
     *
     * @return bool
     *
     * @see		Redis::flushDB()
     */
    public function clean()
    {
        return $this->_redis->flushDB();
    }

    // ------------------------------------------------------------------------

    /**
     * Get cache driver info.
     *
     * @param	string	Not supported in Redis.
     *			Only included in order to offer a
     *			consistent cache API.
     *
     * @return array
     *
     * @see		Redis::info()
     */
    public function cache_info($type = null)
    {
        return $this->_redis->info();
    }

    // ------------------------------------------------------------------------

    /**
     * Get cache metadata.
     *
     * @param	string	Cache key
     *
     * @return array
     */
    public function get_metadata($key)
    {
        $value = $this->get($key);

        if ($value !== false) {
            return [
                'expire' => time() + $this->_redis->ttl($key),
                'data'   => $value,
            ];
        }

        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * Check if Redis driver is supported.
     *
     * @return bool
     */
    public function is_supported()
    {
        if (!extension_loaded('redis')) {
            log_message('debug', 'The Redis extension must be loaded to use Redis cache.');

            return false;
        }

        return true;
    }

    // ------------------------------------------------------------------------

    /**
     * Class destructor.
     *
     * Closes the connection to Redis if present.
     */
    public function __destruct()
    {
        if ($this->_redis) {
            $this->_redis->close();
        }
    }
}
