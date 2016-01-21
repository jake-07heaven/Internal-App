<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = 'errors/page_missing';

$route['employees'] = 'employees/overview';
$route['employees/employee'] = 'employees/overview';
$route['employees/add'] = 'employees/addEmployee';
$route['employees/remove/(:num)'] = 'employees/remove_employee/$1';
$route['employees/employee/(:num)'] = 'employees/overview';
$route['employees/employee/(:num)/(:any)'] = "employees/employee/$1/$2";

$route['companies'] = 'companies/overview';
$route['companies/company'] = 'companies/overview';
$route['companies/add'] = 'companies/addcompany';
$route['companies/remove/(:num)'] = 'companies/remove_company/$1';
$route['companies/company/(:num)'] = 'companies/overview';
$route['companies/company/(:num)/(:any)'] = "companies/company/$1/$2";

$route['jobs'] = 'jobs/overview';
$route['jobs/job'] = 'jobs/overview';
$route['jobs/add'] = 'jobs/addjob';
$route['jobs/remove/(:num)'] = 'jobs/remove_job/$1';
$route['jobs/job/(:num)'] = 'jobs/overview';
$route['jobs/job/(:num)/(:any)'] = "jobs/job/$1/$2";
$route['jobs/update-notes'] = "jobs/update_notes";

$route['issues'] = 'issues/overview';
$route['issues/issue'] = 'issues/overview';
$route['issues/add'] = 'issues/addissue';
$route['issues/remove/(:num)'] = 'issues/remove_issue/$1';
$route['issues/move/(:num)/(:any)'] = 'issues/move_issue/$1/$1';
$route['issues/issue/(:num)'] = 'issues/overview';
$route['issues/issue/(:num)/(:any)'] = "issues/issue/$1/$2";

$route['hrs'] = 'hrs/overview';
$route['hrs/hr'] = 'hrs/overview';
$route['hrs/add'] = 'hrs/addhr';
$route['hrs/remove/(:num)'] = 'hrs/remove_hr/$1';
$route['hrs/move/(:num)/(:any)'] = 'hrs/move_hr/$1/$1';
$route['hrs/hr/(:num)'] = 'hrs/overview';
$route['hrs/hr/(:num)/(:any)'] = "hrs/hr/$1/$2";

$route['routes'] = 'routes/overview';
$route['routes/route'] = 'routes/overview';
$route['routes/update_route'] = 'routes/update_route';
$route['routes/edit'] = 'routes/edit';

$route['services'] = 'services/overview';
$route['services/service'] = 'services/overview';
$route['services/service/(:num)/(:any)'] = "services/service/$1/$2";

$route['timings'] = 'timings/overview';
$route['timings/time'] = 'timings/overview';
$route['timings/time/(:num)/(:any)'] = "timings/time/$1/$2";

$route['admin'] = 'admin';
$route['tasks'] = 'tasks';
$route['tasks/add'] = 'tasks/new_task';
$route['tasks/new'] = 'tasks/add_task_view';
$route['tasks/view/(:num)'] = 'tasks/task_view/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */