<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'commist/ticket_generate';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['ticket_generate'] = 'commist/ticket_generate';
$route['ticket_create'] = 'commist/ticket_create';
$route['ticket_search'] = 'commist/ticket_search';
$route['ticket_log'] = 'commist/ticket_log';

$route['register'] = 'commist/register';
$route['register/add'] = 'commist/register_add';

$route['login'] = 'commist';
$route['logout'] = 'commist/logout';

$route['account/profile'] = 'commist/profile';
$route['account/profile/edit/(:any)'] = 'commist/profile_edit/$1';
$route['account/chgpass'] = 'commist/chgpass';
$route['account/chgpass/edit/(:any)'] = 'commist/chgpass_edit/$1';

$route['adm_user'] = 'commist/adm_user';
$route['adm_user/add'] = 'commist/adm_user_add';
$route['adm_user/edit/(:any)'] = 'commist/adm_user_update/$1';
$route['adm_user/delete/(:any)'] = 'commist/adm_user_delete/$1';

$route['adm_survey'] = 'commist/adm_survey';
$route['adm_survey/add'] = 'commist/adm_survey_add';
$route['adm_survey/edit/(:any)'] = 'commist/adm_survey_update/$1';
$route['adm_survey/delete/(:any)'] = 'commist/adm_survey_delete/$1';

$route['adm_instansi'] = 'commist/adm_instansi';
$route['adm_instansi/add'] = 'commist/adm_instansi_add';
$route['adm_instansi/edit/(:any)'] = 'commist/adm_instansi_update/$1';
$route['adm_instansi/delete/(:any)'] = 'commist/adm_instansi_delete/$1';

$route['dashboards'] = 'commist/dashboards';

$route['all_tickets'] = 'commist/all_tickets';
$route['all_tickets/add'] = 'commist/add_ticket';
$route['all_tickets/edit'] = 'commist/edit_ticket';
$route['all_tickets/delete/(:any)/(:any)'] = 'commist/delete_ticket/$1/$2';
$route['all_tickets/status/(:any)'] = 'commist/status_ticket/$1';
//$route['all_tickets/details/(:any)'] = 'commist/ticket_details/$1';

$route['ticket/(:any)'] = 'commist/ticket_details/$1';
$route['ticket/(:any)/survey/add'] = 'commist/ticket_survey/$1';

$route['finish_ticket/(:any)/(:any)/(:any)'] = 'commist/finish_ticket/$1/$2/$3';

//ajax controller
$route['ajax/search_ticket/(:any)'] = 'ajax/search_ticket/$1';

$route['submitted'] = 'commist/submitted';
$route['accepted'] = 'commist/accepted';
$route['processed'] = 'commist/processed';
$route['discussed'] = 'commist/discussed';
$route['followedup'] = 'commist/followedup';
$route['recommended'] = 'commist/recommended';
$route['rejected'] = 'commist/rejected';

$route['ins/followedup'] = 'commist/ins_followedup';

//test mail & wa
