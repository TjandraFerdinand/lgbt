<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin'] = 'admin/admin/login';
$route['admin/login_action'] = 'admin/admin/login_action';
$route['admin/top'] = 'admin/admin/top';
$route['admin/user/list'] = 'admin/user/list_data';
$route['admin/job/list'] = 'admin/job/list_data';
