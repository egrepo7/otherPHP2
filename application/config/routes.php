<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "Quotes";
$route['users/(:num)'] = "Quotes/viewPoster/$1";
$route['add/(:num)/(:num)'] = "Quotes/addFave/$1/$2";
$route['remove/(:num)/(:num)'] = "Quotes/removeFave/$1/$2";
$route['logout'] = "Quotes/logout";
$route['dash'] = "Quotes/dash";
// $route['userpage'] = "/Quotes/userpage";
// $route['process_form'] = "Surveys/process_form";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */