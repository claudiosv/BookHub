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

$route['books'] = 'books';
$route['book/view/(:num)'] = 'book/view/$1';
$route['books/search']['get'] = 'books/search';
$route['books/search']['post'] = 'books/search_do';
$route['books/upload']['get'] = 'books/upload';
$route['books/upload']['post'] = 'books/upload_do';
$route['book/delete/(:num)'] = 'book/delete/$1';
$route['book/edit/(:num)']['get'] = 'book/edit/$1';
$route['book/edit']['post'] = 'book/edit_do';

$route['author/view'] = 'author/view';
$route['author/view/(:num)'] = 'author/view/$1';
$route['author/delete/(:num)'] = 'author/delete/$1'; //books and comments
$route['author/edit/(:num)']['get'] = 'author/edit/$1'; //books and comments
$route['author/edit']['post'] = 'author/edit_do';
$route['author/add']['post'] = 'author/add_do';
$route['author/add']['get'] = 'author/add';

$route['category/view'] = 'category/view';
$route['category/view/(:num)'] = 'category/view/$1';
$route['category/delete/(:num)'] = 'category/delete/$1'; //books and comments
$route['category/edit/(:num)']['get'] = 'category/edit/$1'; //books and comments
$route['category/edit']['post'] = 'category/edit_do';
$route['category/add']['post'] = 'category/add_do';
$route['category/add']['get'] = 'category/add';

$route['publisher/view'] = 'publisher/view';
$route['publisher/view/(:num)'] = 'publisher/view/$1';
$route['publisher/delete/(:num)'] = 'publisher/delete/$1'; //books and comments
$route['publisher/edit/(:num)']['get'] = 'publisher/edit/$1'; //books and comments
$route['publisher/edit']['post'] = 'publisher/edit_do';
$route['publisher/add']['post'] = 'publisher/add_do';
$route['publisher/add']['get'] = 'publisher/add';

$route['comment/delete/(:num)'] = 'comment/delete/$1';
$route['comment/post'] = 'comment/post';

$route['reports'] = 'reports';
$route['archive'] = 'archive';
$route['archive/do']['post'] = 'archive/do_archive';

$route['default_controller'] = 'books';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*


//invent some reports


//edit, add, delete
$route['user/view/(:num)'] = 'user/view/$1'; //books and comments
$route['user/delete/(:num)'] = 'user/delete/$1'; //books and comments
$route['user/edit/(:num)']['get'] = 'user/edit/$1'; //books and comments
$route['user/edit/(:num)']['post'] = 'user/edit_post';
$route['user/signup']['post'] = 'user/sign_up_post';
$route['user/signup']['get'] = 'user/sign_up_get';
$route['user/login']['post'] = 'user/sign_up_post';
$route['user/login']['get'] = 'user/sign_up_get';










*/