<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/* !
 * HybridAuth
 * http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
 * (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
 */

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config = array(
            // set on "base_url" the relative url that point to HybridAuth Endpoint
            'base_url' => '/auth/endpoint',
            'providers' => array(
                // openid providers
                'OpenID' => array(
                    'enabled' => false,
                ),
                'Yahoo' => array(
                    'enabled' => false,
                    'keys' => array(
                        'id' => (defined('YAHOO_APP_ID')) ? YAHOO_APP_ID : '',
                        'secret' => (defined('YAHOO_APP_SECRET')) ? YAHOO_APP_SECRET : '',
                    ),
                ),
                'Google' => array(
                    'enabled' => true,
                    'keys' => array(
                        'id' => (defined('GOOGLE_APP_ID')) ? GOOGLE_APP_ID : '',
                        'secret' => (defined('GOOGLE_APP_SECRET')) ? GOOGLE_APP_SECRET : '',
                    ),
                ),
                'Facebook' => array(
                    'enabled' => true,
                    'keys' => array(
                        'id' => (defined('FACEBOOK_APP_ID')) ? FACEBOOK_APP_ID : '',
                        'secret' => (defined('FACEBOOK_APP_SECRET')) ? FACEBOOK_APP_SECRET : '',
                    ),
                    'scope' => 'email, user_about_me, user_birthday, user_hometown, user_website',
                    'display' => 'popup',
                ),
                'Twitter' => array(
                    'enabled' => true,
                    'keys' => array(
                        'key' => (defined('TWITTER_APP_ID')) ? TWITTER_APP_ID : '',
                        'secret' => (defined('TWITTER_APP_SECRET')) ? TWITTER_APP_SECRET : '',
                    ),
                ),
                // windows live
                'Live' => array(
                    'enabled' => false,
                    'keys' => array(
                        'id' => (defined('LIVE_APP_ID')) ? LIVE_APP_ID : '',
                        'secret' => (defined('LIVE_APP_SECRET')) ? LIVE_APP_SECRET : '',
                    ),
                ),
                'MySpace' => array(
                    'enabled' => false,
                    'keys' => array(
                        'key' => (defined('MYSPACE_APP_ID')) ? MYSPACE_APP_ID : '',
                        'secret' => (defined('MYSPACE_APP_SECRET')) ? MYSPACE_APP_SECRET : '',
                    ),
                ),
                'LinkedIn' => array(
                    'enabled' => true,
                    'keys' => array(
                        'key' => (defined('LINKEDIN_APP_ID')) ? LINKEDIN_APP_ID : '',
                        'secret' => (defined('LINKEDIN_APP_SECRET')) ? LINKEDIN_APP_SECRET : '',
                    ),
                ),
                'Foursquare' => array(
                    'enabled' => false,
                    'keys' => array(
                        'id' => (defined('FOURSQUARE_APP_ID')) ? FOURSQUARE_APP_ID : '',
                        'secret' => (defined('FOURSQUARE_APP_SECRET')) ? FOURSQUARE_APP_SECRET : '',
                    ),
                ),
            ),
            // if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
            'debug_mode' => (ENVIRONMENT == 'development'),
            'debug_file' => APPPATH.'/logs/hybridauth.log',
);

/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */
