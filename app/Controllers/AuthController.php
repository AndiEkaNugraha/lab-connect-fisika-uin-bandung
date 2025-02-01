<?php

namespace App\Controllers;
use App\Services\Auth;
use App\Models\User;
use Core\View;
use Core\Router;
class AuthController {
    public function index() {
        return "temp Page";
    }
    public function signin() {
        return View::render(
            template:'user/authorize/signIn/index', 
            data:['message'=> 'Hello World!'],
            layout: 'layout/authorize/main'
        );
    }
    public function store() {
        //To do CSRF

        $email =  $_POST['email'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']) ? (bool)$_POST['remember'] : false;
        // Attempt auth
        if (Auth::attempt($email, $password, $remember)) {
            Router::redirect('/u/'. Auth::user()->seo_user);
        }
        return View::render(
            template:'user/authorize/signIn/index', 
            data:['error'=> 'Password or Email is incorrect'],
            layout: 'layout/authorize/main'
        ); 
    }

    public function destroy() {
        Auth::logout();
        Router::redirect('/u/sign-in');
    }

    public function SignUp() {
        return View::render(
            template:'user/authorize/signUp/index', 
            data:['message'=> 'Hello World!'],
            layout: 'layout/authorize/main'
        );
    }

    public function createUser() {
        $name = $_POST['name'];
        $nim = $_POST['nim'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $cat_id = User::CategoriesUserLaboran();
        // Validasi input kosong
        if (!$name || !$nim || !$email || !$phone || !$password) {
            return View::render(
                template: 'user/authorize/signUp/index',
                data: ['error' => 'Please fill in all the required fields.'],
                layout: 'layout/authorize/main'
            );
        }

        $invalidPassword = !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
        $invalidEmail = !filter_var($email, FILTER_VALIDATE_EMAIL)?? true;
        $nimRegistered = User::findByNim($nim);
        $emailRegistered = User::findByEmail($email);
        if ($nimRegistered || $emailRegistered || $invalidEmail || $invalidPassword) {
            return View::render(
                template:'user/authorize/signUp/index', 
                data:[
                    'invalidEmail'=> $invalidEmail,
                    'invalidPassword'=> $invalidPassword,
                    'nimRegistered' => $nimRegistered,
                    'emailRegistered' => $emailRegistered,
                    'name' => $name,
                    'nim' => $nim,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => $password
                ],
                layout: 'layout/authorize/main'
            ); 
        }
        
        $user = [
            'name'=> $name,
            'cat_id'=> $cat_id,
            'nim'=> $nim,
            'phone'=> $phone,
            'email'=> $email,
            'hash_password'=> password_hash($password, PASSWORD_DEFAULT),
            'seo_user'=> str_replace(' ', '-', strtolower($name))  . '-' . $nim,
        ];

        $userCreated = User::create($user);
        if ($userCreated != null) {
            Router::redirect('/logout');
        }
        return View::render(
            template: 'user/authorize/signUp/index',
            data: ['error' => 'Failed to create user.'],
            layout: 'layout/authorize/main'
        );
    }
}