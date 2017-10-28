<?php

/**
 * SmartCMS.
 *
 * A full featured CMS software to quickly get started with a new PHP project.
 *
 * @author	Manish Jangir <mjangir70@gmail.com>
 * @copyright	Copyright (c) 2016, Manish Jangir (http://manishjangir.com/)
 *
 * @link	http://manishjangir.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * MY_Form_validation Class.
 *
 * Provides doctrine ORM integration in codeigniter
 *
 * @category	Library
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class MY_Form_validation extends CI_Form_validation
{
    /**
     * Class constructor.
     *
     * Calls parent class constructor
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    /**
     * Return form erros as array.
     *
     * @return bool
     */
    public function error_array()
    {
        if (count($this->_error_array) === 0) {
            return false;
        } else {
            return $this->_error_array;
        }
    }

    /**
     * Validate URL string.
     *
     * @param string $url
     *
     * @return bool
     */
    public function valid_url($url)
    {
        $pattern = "/((?:https?\:\/\/|[a-z]\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)/i";
        if (!preg_match($pattern, $url)) {
            return false;
        }

        return true;
    }

    /**
     * Validate alpha numeric string.
     *
     * @param string $str
     *
     * @return bool
     */
    public function alpha_dash_space($str)
    {
        $pattern = "/^[a-z\d\-_\s]+$/i";

        return (!preg_match($pattern, $str)) ? false : true;
    }
}
