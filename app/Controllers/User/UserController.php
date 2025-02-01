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
        return View::render(
            template:'user/userManagement/index', 
            data:[
                'user_seo'=> $user_seo,
                'edit_tableJs' => true,
            ],
            layout: 'layout/user/main'
        ); 
    }
}