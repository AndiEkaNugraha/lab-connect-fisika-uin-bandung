<?php
/**
 * @var Core\Router $router
 */

use App\Middlewares\Auth;
use App\Middlewares\CSRF;
use App\Middlewares\View;

$router->addGlobalMiddleware(View::class);
$router->addGlobalMiddleware(CSRF::class);
$router->addRouteMiddleware('auth', Auth::class);

$router->add('GET', '/', 'HomeController@index');
$router->add('GET', '/u', 'User\UserController@index');
$router->add('GET', '/u/sign-in', 'AuthController@signIn');
$router->add('POST', '/u/sign-in', 'AuthController@store');
$router->add('GET', '/u/sign-up', 'AuthController@signUp');
$router->add('POST', '/u/sign-up', 'AuthController@createUser');
$router->add('GET', '/logout','AuthController@destroy');
$router->add('GET', '/u/{user_seo}', 'User\UserController@dashboard', ['auth']);
$router->add('GET', '/u/{user_seo}/profile', 'User\UserController@profile', ['auth']);
$router->add('POST', '/u/{user_seo}/profile/update','User\UserController@profileUpdate', ['auth']);
$router->add('GET', '/u/{user_seo}/manajemen-user/laboratory', 'User\UserController@listLaboran', ['auth']);
$router->add('POST', '/u/{user_seo}/manajemen-user/create','User\UserController@createUser', ['auth']);
$router->add('GET', '/u/{user_seo}/lab-equipment', 'User\EquipmentController@listEquipment', ['auth']);
$router->add('GET', '/u/{user_seo}/lab-equipment', 'User\NewsController@listEquipment', ['auth']);