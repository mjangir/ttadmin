<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
define('SHOW_DEBUG_BACKTRACE', true);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/*
|--------------------------------------------------------------------------
| Define API URL
|--------------------------------------------------------------------------
|
*/
define('API_BASE_PATH', 'http://localhost:9000');

/*
|--------------------------------------------------------------------------
| Define Upload Paths
|--------------------------------------------------------------------------
|
*/

define('BASE_PATH',                 APPPATH.'../');
define('ROOT_UPLOAD',               APPPATH.'../uploads/');
define('USER_PROFILE_UPLOAD_PATH',  ROOT_UPLOAD.'user/');
define('UPLOAD_TEMP_PATH',  ROOT_UPLOAD.'temp/');

/*
|--------------------------------------------------------------------------
| Admin Email ID to which all important system mails will got for e.g.
| Contact Us form data
|--------------------------------------------------------------------------
|
*/
define('ADMIN_EMAIL', 'smartcmsportal@gmail.com');

/*
|--------------------------------------------------------------------------
| Encryption key to use as salt in data encryption
|--------------------------------------------------------------------------
|
*/
define('ENCRYPTION_KEY', '34njkkj$%uikjjkn435jk&^%&kj45');

/*
|--------------------------------------------------------------------------
| Default User Role ID. Guest user role id will be 1 and Admin user role id
| will be 2
|--------------------------------------------------------------------------
|
*/
define('GUEST_ROLE_ID', 2);
define('ADMIN_ROLE_ID', 1);

/*
|--------------------------------------------------------------------------
| Default User Group ID. Guest user group id will be 1 and Admin user group id
| will be 2
|--------------------------------------------------------------------------
|
*/
define('GUEST_GROUP_ID', 2);
define('ADMIN_GROUP_ID', 1);

/*
|--------------------------------------------------------------------------
| Mail Configuration for swift mailer. Default mail transport is smtp.
| You can changed it to sendmail also.
|--------------------------------------------------------------------------
|
*/
define('__MAIL_TRANSPORT_TYPE__', 'smtp'); // Possible values smtp and sendmail
define('__MAIL_FROM__', 'no-reply@smartcms.com');

//SMTP Configurations
define('__SMTP_SERVER__', 'smtp.gmail.com');
define('__SMTP_PORT__', '465');
define('__SMTP_USERNAME__', 'smartcmsportal@gmail.com');
define('__SMTP_PASSWORD__', 'xxxxxx');

//SENDMAIL Configurations
define('__SENDMAIL_PATH__', '/usr/sbin/sendmail -bs');

/*
|--------------------------------------------------------------------------
| Social Media App Configurations To Login Using Oauth
|--------------------------------------------------------------------------
|
*/

//Facebook App Credentials
define('FACEBOOK_APP_ID',           '243043329392131');
define('FACEBOOK_APP_SECRET',       '0317a3691bcebf4774261c7adb184255');

//Google App Credentials
define('GOOGLE_APP_ID',           '719554222020-n77b0nkdd3tjtreq0e3kngf769ajgggq.apps.googleusercontent.com');
define('GOOGLE_APP_SECRET',       'hYaQ3sA72uUn814Gc_qWwOzI');

//Twitter App Credentials
define('TWITTER_APP_ID',           'bQOf33ZHxvdzUk4EjYyrrDQRD');
define('TWITTER_APP_SECRET',       'ciwgkzVojCegxltzcjz697NBkCABJ2ZPrc2vbd0n5gZHnxH8eW');

//Linkedin App Credentials
define('LINKEDIN_APP_ID',           '759vbya4o27wt9');
define('LINKEDIN_APP_SECRET',       'e08yU3T1LWxaZFF3');
