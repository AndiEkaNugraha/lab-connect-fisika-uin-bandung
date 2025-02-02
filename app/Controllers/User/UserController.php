<?php

namespace App\Controllers\User;
use App\Services\Auth;
use App\Services\CSRF;
use Core\View;
use Core\Router;
use App\Models\User;
class UserController {
    public function index() {
        if (Auth::user()) {
            return Router::redirect('/u/'.Auth::user()->seo_user);
        }
        return Router::redirect('/u/sign-in');
    }
    public function dashboard($user_seo) {
        return View::render(
            template:'user/dashboard/index', 
            data:['user_seo'=> $user_seo],
            layout: 'layout/user/main'
        );
    }
    public function profile($user_seo){
        return View::render(
            template:'user/profile/index', 
            data:[
                'user_seo'=> $user_seo,
                'edit_longForm' => true,
                'edit_avatar'=> true,
            ],
            layout: 'layout/user/main'
        );
    }
    public function profileUpdate($user_seo){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $major = $_POST['major'];
        $bio = $_POST['bio'];
        $address = $_POST['address'];
        $instagram = $_POST['instagram'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $linkedin = $_POST['linkedin'];
        $avatarPath = null;
        if (!empty($_FILES['avatar']['name'])) {
            $avatarPath = User::uploadFile($_FILES['avatar'], 'assets/file/avatar/');
        }
        $userVerified = Auth::user();
        if (!$userVerified) {
            return Router::redirect('/u/sign-in');       
        }
        $user = User::find($userVerified->id);
        if ($user != null) {
            $user->name = strlen($name) != 0 ? $name : $user->name;
            $user->phone = strlen($phone) != 0 ? $phone : $user->phone;
            $user->mobile = strlen($mobile) != 0 ? $mobile : $user->mobile;
            $user->email = strlen($email) != 0 ? $email : $user->email;
            $user->major = strlen($major) != 0 ? $major : $user->major;
            $user->bio = strlen($bio) != 0 ? $bio : $user->bio;
            $user->address = strlen($address) != 0 ? $address : $user->address;
            $user->instagram = strlen($instagram) != 0 ? $instagram : $user->instagram;
            $user->facebook = strlen($facebook) != 0 ? $facebook : $user->facebook;
            $user->twitter = strlen($twitter) != 0 ? $twitter : $user->twitter;
            $user->linkedin = strlen($linkedin) != 0 ? $linkedin : $user->linkedin;
            $user->avatar = $avatarPath ? $_FILES['avatar']['name']: $user->avatar;

            $user->save();
            return Router::redirect('/u/'.$user->seo_user.'/profile');
        }
        return View::render(
            template:'user/profile/index', 
            data:[
                'user_seo'=> $user_seo,
                'error' => 'Failed to update profile',
            ],
            layout: 'layout/user/main'
        );
    }
    public function listLaboran($user_seo){
        $listUser = User::findByCat(2);
        return View::render(
            template:'user/userManagement/index', 
            data:[
                'user_seo'=> $user_seo,
                'page' => 'Labolatory',
                'cat_id'=> '2',
                'listUser' => $listUser??[],
                'datatabel' => true,
                'switchButton'=> true,
                'alert'=> true,
            ],
            layout: 'layout/user/main'
        ); 
    }
    public function listLecturer($user_seo){
        $listUser = User::findByCat(3);
        return View::render(
            template:'user/userManagement/index', 
            data:[
                'user_seo'=> $user_seo,
                'page' => 'Lecturer',
                'cat_id'=> '3',
                'listUser' => $listUser??[],
                'datatabel' => true,
                'switchButton'=> true,
                'alert'=> true,
            ],
            layout: 'layout/user/main'
        ); 
    }public function listStudent($user_seo){
        $listUser = User::findByCat(4);
        return View::render(
            template:'user/userManagement/index', 
            data:[
                'user_seo'=> $user_seo,
                'page' => 'Student',
                'cat_id'=> '4',
                'listUser' => $listUser??[],
                'datatabel' => true,
                'switchButton'=> true,
                'alert'=> true,
            ],
            layout: 'layout/user/main'
        ); 
    }
    public function createUser($user_seo){
        $name = $_POST['name'];
        $nim = $_POST['nim'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $cat_id = $_POST['cat_id'];
        $page = $_POST['page'];
        if (!$name || !$nim || !$email || !$phone || !$password) {
            $listUser = User::findByCat($cat_id);
            return View::render(
                template: 'user/userManagement/index',
                data: [
                    'error' => 'Please fill in all the required fields.',
                    'user_seo'=> $user_seo,
                    'page' => $page,
                    'cat_id'=> $cat_id,
                    'listUser' => $listUser,
                    'datatabel' => true,
                    'switchButton'=> true,
                    'alert'=> true,
                ],
                layout: 'layout/user/main'
            );
        }

        $invalidPassword = !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
        $invalidEmail = !filter_var($email, FILTER_VALIDATE_EMAIL)?? true;
        $nimRegistered = User::findByNim($nim);
        $emailRegistered = User::findByEmail($email);
        if ($nimRegistered || $emailRegistered || $invalidEmail || $invalidPassword) {
            $listUser = User::findByCat($cat_id);
            return View::render(
                template:'user/userManagement/index', 
                data:[
                    'invalidEmail'=> $invalidEmail,
                    'invalidPassword'=> $invalidPassword,
                    'nimRegistered' => $nimRegistered,
                    'emailRegistered' => $emailRegistered,
                    'name' => $name,
                    'nim' => $nim,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => $password,
                    'user_seo'=> $user_seo,
                    'page' => $page,
                    'cat_id'=> $cat_id,
                    'listUser' => $listUser,
                    'datatabel' => true,
                    'switchButton'=> true,
                    'alert'=> true,
                ],
                layout: 'layout/user/main'
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
            $listUser = User::findByCat($cat_id);
            return View::render(
                template:'user/userManagement/index', 
                data:[
                    'user_seo'=> $user_seo,
                    'page' => $page,
                    'cat_id'=> $cat_id,
                    'success'=> 'Create user successfully.',
                    'listUser' => $listUser,
                    'datatabel' => true,
                    'switchButton'=> true,
                    'alert'=> true,
                ],
                layout: 'layout/user/main'
            );
        }
        $listUser = User::findByCat($cat_id);
        return View::render(
            template:'user/userManagement/index', 
            data:[
                'user_seo'=> $user_seo,
                'page' => $page,
                'cat_id'=> $cat_id,
                'error' => 'Failed to create user.',
                'listUser' => $listUser,
                'datatabel' => true,
                'switchButton'=> true,
                'alert'=> true,
            ],
            layout: 'layout/user/main'
        );
        

    }
    public function deleteUser($user_seo) {
        $id = $_POST['id'];

        $deleteUser = User::find($id);  
        if ($deleteUser != null) {
            $deleteUser->is_deleted = 1;
            $deleteUser->save();
            $response['success'] = true;
            return json_encode($response);
        }
        $response['success'] = false;
        return json_encode($response);
    }
    public function editUser($user_seo) {
        $id = $_POST['id'];
        $status = $_POST['is_active'];
        $editUser = User::find($id);  
        // $editUser = null; 
        if ($editUser != null) {
            $editUser->is_active = $_POST['is_active']??0;
            $editUser->save();
            $response['success'] = true;
            $response['csrf_token'] = csrf_token_value();
            return json_encode($response);
        }
        $response['success'] = false;
        return json_encode($response);
    }
}