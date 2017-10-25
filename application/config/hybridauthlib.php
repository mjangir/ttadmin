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

$config = [
            // set on "base_url" the relative url that point to HybridAuth Endpoint
            'base_url'  => '/auth/endpoint',
            'providers' => [
                // openid providers
                'OpenID' => [
                    'enabled' => false,
                ],
                'Yahoo' => [
                    'enabled' => false,
                    'keys'    => [
                        'id'     => (defined('YAHOO_APP_ID')) ? YAHOO_APP_ID : '',
                        'secret' => (defined('YAHOO_APP_SECRET')) ? YAHOO_APP_SECRET : '',
                    ],
                ],
                'Google' => [
                    'enabled' => true,
                    'keys'    => [
                        'id'     => (defined('GOOGLE_APP_ID')) ? GOOGLE_APP_ID : '',
                        'secret' => (defined('GOOGLE_APP_SECRET')) ? GOOGLE_APP_SECRET : '',
                    ],
                ],
                'Facebook' => [
                    'enabled' => true,
                    'keys'    => [
                        'id'     => (defined('FACEBOOK_APP_ID')) ? FACEBOOK_APP_ID : '',
                        'secret' => (defined('FACEBOOK_APP_SECRET')) ? FACEBOOK_APP_SECRET : '',
                    ],
                    'scope'   => 'email, user_about_me, user_birthday, user_hometown, user_website',
                    'display' => 'popup',
                ],
                'Twitter' => [
                    'enabled' => true,
                    'keys'    => [
                        'key'    => (defined('TWITTER_APP_ID')) ? TWITTER_APP_ID : '',
                        'secret' => (defined('TWITTER_APP_SECRET')) ? TWITTER_APP_SECRET : '',
                    ],
                ],
                // windows live
                'Live' => [
                    'enabled' => false,
                    'keys'    => [
                        'id'     => (defined('LIVE_APP_ID')) ? LIVE_APP_ID : '',
                        'secret' => (defined('LIVE_APP_SECRET')) ? LIVE_APP_SECRET : '',
                    ],
                ],
                'MySpace' => [
                    'enabled' => false,
                    'keys'    => [
                        'key'    => (defined('MYSPACE_APP_ID')) ? MYSPACE_APP_ID : '',
                        'secret' => (defined('MYSPACE_APP_SECRET')) ? MYSPACE_APP_SECRET : '',
                    ],
                ],
                'LinkedIn' => [
                    'enabled' => true,
                    'keys'    => [
                        'key'    => (defined('LINKEDIN_APP_ID')) ? LINKEDIN_APP_ID : '',
                        'secret' => (defined('LINKEDIN_APP_SECRET')) ? LINKEDIN_APP_SECRET : '',
                    ],
                ],
                'Foursquare' => [
                    'enabled' => false,
                    'keys'    => [
                        'id'     => (defined('FOURSQUARE_APP_ID')) ? FOURSQUARE_APP_ID : '',
                        'secret' => (defined('FOURSQUARE_APP_SECRET')) ? FOURSQUARE_APP_SECRET : '',
                    ],
                ],
            ],
            // if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
            'debug_mode' => (ENVIRONMENT == 'development'),
            'debug_file' => APPPATH.'/logs/hybridauth.log',
];

/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */
