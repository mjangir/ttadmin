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
 * Utils Class.
 *
 * Utility class for the application
 *
 * @category	Library
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Utils
{
    /**
     * Salt Key To Encrypt.
     * 
     * @var string
     */
    protected static $salt = 'nxHJe36JalQ32hMyRxx8Dm';

    /**
     * Hash Method.
     * 
     * @var string
     */
    protected static $method = 'md5';

    /**
     * Encryption Key.
     * 
     * @var string
     */
    protected static $encKey = 'a3majhk6HJ5mh';

    /**
     * Encryption Key.
     * 
     * @var string
     */
    protected static $ENCRYPTION_KEY;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        self::$ENCRYPTION_KEY = 'heeeeasdfasdfasfdasdf';
    }

    /**
     * Generate random string.
     * 
     * @return string
     */
    public static function generateRandomString()
    {
        $id = uniqid();

        $id = base_convert($id, 16, 2);
        $id = str_pad($id, strlen($id) + (8 - (strlen($id) % 8)), '0', STR_PAD_LEFT);

        $chunks = str_split($id, 8);
        //$mask = (int) base_convert(IDGenerator::BIT_MASK, 2, 10);

        $id = array();
        foreach ($chunks as $key => $chunk) {
            //$chunk = str_pad(base_convert(base_convert($chunk, 2, 10) ^ $mask, 10, 2), 8, '0', STR_PAD_LEFT);
            if ($key & 1) {
                array_unshift($id, $chunk);
            } else {
                array_push($id, $chunk);
            }
        }

        return base_convert(implode($id), 2, 36);
    }

    /**
     * Generates hash of a value.
     * 
     * @param string $value
     * 
     * @return string
     */
    public static function hash($value)
    {
        if (self::$method == 'md5') {
            return md5(self::$salt.$value);
        } elseif (self::$method == 'sha1') {
            return sha1(self::$salt.$value);
        } elseif (self::$method == 'bcrypt') {
            $bcrypt = new Bcrypt();
            $bcrypt->setCost(14);

            return $bcrypt->create($value);
        }
    }

    /**
     * Creates slug from a string.
     * 
     * @param string $text
     * 
     * @return string
     */
    public static function slugify($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    /**
     * Encrypt an integer number.
     * 
     * @param int    $id
     * @param string $key
     * 
     * @return string
     */
    public static function encryptId($id, $key)
    {
        $key = (!empty($key)) ? $key : self::$encKey;
        $id = base_convert($id, 10, 36); // Save some space
        $data = mcrypt_encrypt(MCRYPT_BLOWFISH, $key, $id, 'ecb');
        $data = bin2hex($data);

        return $data;
    }

    /**
     * Decrypt an encrypted number.
     * 
     * @param string $encryptedId
     * @param string $key
     * 
     * @return int
     */
    public static function decryptId($encryptedId, $key)
    {
        $key = (!empty($key)) ? $key : self::$encKey;
        $data = pack('H*', $encryptedId); // Translate back to binary
        $data = mcrypt_decrypt(MCRYPT_BLOWFISH, $key, $data, 'ecb');
        $data = base_convert($data, 36, 10);

        return $data;
    }

    /**
     * Encrypt a string using salt.
     * 
     * @param string $encrypt
     * @param string $key
     * 
     * @return string
     */
    public function encrypt($encrypt, $key = null)
    {
        $key = !empty($key) ? $key : self::$ENCRYPTION_KEY;
        $encrypt = serialize($encrypt);
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
        $key = pack('C*', $key);
        $mac = hash_hmac('sha256', $encrypt, substr(bin2hex($key), -32));
        $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $encrypt.$mac, MCRYPT_MODE_CBC, $iv);
        $encoded = base64_encode($passcrypt).'|'.base64_encode($iv);

        return $encoded;
    }

    /**
     * Decrypt a string using salt.
     * 
     * @param string $decrypt
     * @param string $key
     * 
     * @return string
     */
    public function decrypt($decrypt, $key = null)
    {
        $key = !empty($key) ? $key : self::$ENCRYPTION_KEY;
        $decrypt = explode('|', $decrypt.'|');
        $decoded = base64_decode($decrypt[0]);
        $iv = base64_decode($decrypt[1]);
        if (strlen($iv) !== mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)) {
            return false;
        }
        $key = pack('C*', $key);
        $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_CBC, $iv));
        $mac = substr($decrypted, -64);
        $decrypted = substr($decrypted, 0, -64);
        $calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($key), -32));
        if ($calcmac !== $mac) {
            return false;
        }
        $decrypted = unserialize($decrypted);

        return $decrypted;
    }
}
