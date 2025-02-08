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
$router->add('GET', '/labolatorium', 'labolatoryController@index');
$router->add('GET', '/labolatorium/{lab_seo}', 'labolatoryController@detailLab');
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
$router->add('GET', '/u/{user_seo}/manajemen-user/lecturer', 'User\UserController@listLecturer', ['auth']);
$router->add('GET', '/u/{user_seo}/manajemen-user/student', 'User\UserController@listStudent', ['auth']);
$router->add('POST', '/u/{user_seo}/manajemen-user/laboratory','User\UserController@createUser', ['auth']);
$router->add('POST', '/u/{user_seo}/manajemen-user/lecturer','User\UserController@createUser', ['auth']);
$router->add('POST', '/u/{user_seo}/manajemen-user/student','User\UserController@createUser', ['auth']);
$router->add('POST', '/u/{user_seo}/manajemen-user/delete','User\UserController@deleteUser', ['auth']);
$router->add('POST', '/u/{user_seo}/manajemen-user/edit','User\UserController@editUser', ['auth']);
$router->add('GET', '/u/{user_seo}/lab', 'User\LabController@listLab', ['auth']);
$router->add('POST', '/u/{user_seo}/lab', 'User\LabController@deleteLab', ['auth']);
$router->add('GET', '/u/{user_seo}/lab/create', 'User\LabController@createLab', ['auth']);
$router->add('POST', '/u/{user_seo}/lab/create', 'User\LabController@addLab', ['auth']);
$router->add('GET', '/u/{user_seo}/lab/edit/{lab_seo}', 'User\LabController@editLab', ['auth']);
$router->add('POST', '/u/{user_seo}/lab/edit/{lab_seo}', 'User\LabController@updateLab', ['auth']);
$router->add('GET', '/u/{user_seo}/lab-equipment', 'User\EquipmentController@listEquipment', ['auth']);
$router->add('POST', '/u/{user_seo}/lab-equipment', 'User\EquipmentController@deleteEquipment', ['auth']);
$router->add('GET', '/u/{user_seo}/lab-equipment/create', 'User\EquipmentController@detailEquipment', ['auth']);
$router->add('POST', '/u/{user_seo}/lab-equipment/create', 'User\EquipmentController@AddEquipment', ['auth']);
$router->add('GET', '/u/{user_seo}/lab-equipment/edit/{equipment_seo}', 'User\EquipmentController@editEquipment', ['auth']);
$router->add('POST', '/u/{user_seo}/lab-equipment/edit/{equipment_seo}', 'User\EquipmentController@updateEquipment', ['auth']);

$router->add('GET', '/u/{user_seo}/reservation-lab', 'User\labSubmissionController@listReservation', ['auth']);
$router->add('GET', '/u/{user_seo}/reservation-lab/create', 'User\labSubmissionController@createReservation', ['auth']);
$router->add('POST', '/u/{user_seo}/reservation-lab/create', 'User\labSubmissionController@AddReservation', ['auth']);
$router->add('GET', '/u/{user_seo}/reservation-lab/{reservation_id}', 'User\labSubmissionController@editReservation', ['auth']);
$router->add('POST', '/u/{user_seo}/reservation-lab/{reservation_id}', 'User\labSubmissionController@updateReservation', ['auth']);

$router->add('GET', '/u/{user_seo}/lab-reservation', 'User\ApproverController@listReservationLab', ['auth']);
$router->add('GET', '/u/{user_seo}/lab-reservation/{reservation_id}', 'User\ApproverController@detailReservationLab', ['auth']);
$router->add('POST', '/u/{user_seo}/lab-reservation/{reservation_id}', 'User\ApproverController@updateReservationLab', ['auth']);

$router->add('GET', '/u/{user_seo}/lab-news', 'User\NewsController@listNews', ['auth']);

