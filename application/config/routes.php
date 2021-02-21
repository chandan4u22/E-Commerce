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
|	https://codeigniter.com/user_guide/general/routing.html
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
// Admin routing
$route['admin'] = 'Admin';
$route['admin/login'] = 'Admin/login';
$route['admin/logout'] = 'Admin/logout';
$route['admin/upload'] = 'Admin/upload';

$route['admin/category'] = 'AdminCategory';
$route['admin/category/add'] = 'AdminCategory/add';
$route['admin/category/edit/(:num)'] = 'AdminCategory/edit/$1';
$route['admin/category/autocomplete'] = 'AdminCategory/autocomplete';

$route['admin/product'] = 'AdminProduct';
$route['admin/product/add'] = 'AdminProduct/add';
$route['admin/product/edit/(:num)'] = 'AdminProduct/edit/$1';
$route['admin/product/autocomplete'] = 'AdminProduct/autocomplete';

$route['admin/manufacturer'] = 'AdminManufacturer';
$route['admin/manufacturer/add'] = 'AdminManufacturer/add';
$route['admin/manufacturer/edit/(:num)'] = 'AdminManufacturer/edit/$1';
$route['admin/manufacturer/delete/(:num)'] = 'AdminManufacturer/delete/$1';

$route['admin/manufacturer/autocomplete'] = 'AdminManufacturer/autocomplete';

$route['admin/order'] = 'AdminOrder';
$route['admin/order/add'] = 'AdminOrder/add';
$route['admin/order/edit/(:num)'] = 'AdminOrder/edit/$1';

$route['admin/customer'] = 'AdminCustomer';
$route['admin/customer/add'] = 'AdminCustomer/add';
$route['admin/customer/edit/(:num)'] = 'AdminCustomer/edit/$1';

$route['admin/option'] = 'AdminOption';
$route['admin/option/add'] = 'AdminOption/add';
$route['admin/option/edit/(:num)'] = 'AdminOption/edit/$1';
$route['admin/option/autocomplete'] = 'AdminOption/autocomplete';

$route['admin/attribute'] = 'AdminAttribute';
$route['admin/attribute/add'] = 'AdminAttribute/add';
$route['admin/attribute/edit/(:num)'] = 'AdminAttribute/edit/$1';
$route['admin/attribute/autocomplete'] = 'AdminAttribute/autocomplete';

$route['admin/banner'] = 'AdminBanner';
$route['admin/banner/add'] = 'AdminBanner/add';
$route['admin/banner/edit/(:num)'] = 'AdminBanner/edit/$1';
// Admin routing end

//Frontend routing
$route['default_controller'] = 'Home';
$route['my-account'] = 'MyAccount';
$route['homepage'] = 'Homepage';
$route['about'] = 'About';
$route['cart'] = 'Cart';
$route['address'] = 'Address';
$route['category/(:num)'] = 'Category/index/$1';
$route['checkout'] = 'Checkout';
$route['contact'] = 'Contact';
$route['wishlist'] = 'Wishlist';
$route['search'] = 'Search';
$route['product/(:num)'] = 'ProductDetail/index/$1';
$route['order'] = 'OrderList';
$route['order/detail'] = 'OrderDetail';
$route['privacy-policy'] = 'PrivacyPolicy';
$route['term-and-condition'] = 'TermCondition';
$route['login'] = 'login';
$route['registration'] = 'registration';
$route['logout'] = 'logout';
//Frontend routing End

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
