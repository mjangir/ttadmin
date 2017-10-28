<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

/**
 * HybridAuth storage manager.
 */
class Hybrid_Storage
{
    public function __construct()
    {
        if (!session_id()) {
            if (!session_start()) {
                throw new Exception("Hybridauth requires the use of 'session_start()' at the start of your script, which appears to be disabled.", 1);
            }
        }

        $this->config('php_session_id', session_id());
        $this->config('version', Hybrid_Auth::$version);
    }

    public function config($key, $value = null)
    {
        $key = strtolower($key);

        if ($value) {
            $_SESSION['HA::CONFIG'][$key] = serialize($value);
        } elseif (isset($_SESSION['HA::CONFIG'][$key])) {
            return unserialize($_SESSION['HA::CONFIG'][$key]);
        }
    }

    public function get($key)
    {
        $key = strtolower($key);

        if (isset($_SESSION['HA::STORE'], $_SESSION['HA::STORE'][$key])) {
            return unserialize($_SESSION['HA::STORE'][$key]);
        }
    }

    public function set($key, $value)
    {
        $key = strtolower($key);

        $_SESSION['HA::STORE'][$key] = serialize($value);
    }

    public function clear()
    {
        $_SESSION['HA::STORE'] = [];
    }

    public function delete($key)
    {
        $key = strtolower($key);

        if (isset($_SESSION['HA::STORE'], $_SESSION['HA::STORE'][$key])) {
            $f = $_SESSION['HA::STORE'];
            unset($f[$key]);
            $_SESSION['HA::STORE'] = $f;
        }
    }

    public function deleteMatch($key)
    {
        $key = strtolower($key);

        if (isset($_SESSION['HA::STORE']) && count($_SESSION['HA::STORE'])) {
            $f = $_SESSION['HA::STORE'];
            foreach ($f as $k => $v) {
                if (strstr($k, $key)) {
                    unset($f[$k]);
                }
            }
            $_SESSION['HA::STORE'] = $f;
        }
    }

    public function getSessionData()
    {
        if (isset($_SESSION['HA::STORE'])) {
            return serialize($_SESSION['HA::STORE']);
        }
    }

    public function restoreSessionData($sessiondata = null)
    {
        $_SESSION['HA::STORE'] = unserialize($sessiondata);
    }
}
