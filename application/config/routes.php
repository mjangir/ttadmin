<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

//Frontend Routes
$route['auth/login'] = 'auth/login';
$route['auth/logout'] = 'auth/logout';
$route['auth/register'] = 'auth/register';
$route['auth/confirm-registration'] = 'auth/confirmregistration';
$route['auth/forgot-password'] = 'auth/forgotpassword';
$route['auth/reset-password'] = 'auth/resetpassword';
$route['auth/social/(:any)'] = 'auth/social/$1';

$route['my-account'] = 'frontend/dashboard/index';
$route['settings'] = 'frontend/settings/index';
$route['settings/updateprofile'] = 'frontend/settings/updateprofile';
$route['settings/changepassword'] = 'frontend/settings/changepassword';

$route['page/(:any)'] = 'frontend/page/index/$1';
$route['page/contact'] = 'frontend/page/contact';

//Admin Routes
//Dashboard
$route['admin'] = 'admin/dashboard/index';
$route['admin/dashboard'] = 'admin/dashboard/index';

//Settings
$route['admin/settings/site-settings'] = 'admin/settings/site';

//Email Templates
$route['admin/email-templates'] = 'admin/emailtemplate';
$route['admin/email-templates/add-update'] = 'admin/emailtemplate/addupdate';
$route['admin/email-templates/delete'] = 'admin/emailtemplate/delete';

//Links
$route['admin/links'] = 'admin/link';
$route['admin/links/view'] = 'admin/link/view';
$route['admin/links/add-update'] = 'admin/link/addupdate';
$route['admin/links/delete'] = 'admin/link/delete';
$route['admin/links/status'] = 'admin/link/status';

$route['admin/links/categories'] = 'admin/linkcategory';

//User Groups
$route['admin/user-groups'] = 'admin/usergroup';
$route['admin/user-groups/view'] = 'admin/usergroup/view';
$route['admin/user-groups/add-update'] = 'admin/usergroup/addupdate';
$route['admin/user-groups/delete'] = 'admin/usergroup/delete';
$route['admin/user-groups/status'] = 'admin/usergroup/status';
$route['admin/user-groups/permissions'] = 'admin/usergroup/permissions';
$route['admin/user-groups/update-permissions'] = 'admin/usergroup/updatepermissions';

//Users
$route['admin/users'] = 'admin/user';
$route['admin/users/view'] = 'admin/user/view';
$route['admin/users/add-update'] = 'admin/user/addupdate';
$route['admin/users/delete'] = 'admin/user/delete';
$route['admin/users/status'] = 'admin/user/status';

//CMS Jackpots
$route['admin/jackpots'] = 'admin/jackpot';
$route['admin/jackpots/view'] = 'admin/jackpot/view';
$route['admin/jackpots/add-update'] = 'admin/jackpot/addupdate';
$route['admin/jackpots/delete'] = 'admin/jackpot/delete';
$route['admin/jackpots/status'] = 'admin/jackpot/status';
$route['admin/jackpots/game-history'] = 'admin/jackpot/gamehistory';
