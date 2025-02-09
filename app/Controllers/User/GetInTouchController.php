<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;
use App\Services\Auth;
use App\Models\Contact;

class GetInTouchController {

    public function index($user_seo) {
        Authorization::verify('get_in_touch');
        $user = Auth::user();
        $listMessegage = Contact::findAll();
        return View::render(
            template:'user/get-in-touch/list_get-in-touch/index',
            layout: 'layout/user/main',
            data: [
                'user' => $user,
                'listMessegage' => $listMessegage
            ]
        );
    }

    public function detail($user_seo, $id) {
        Authorization::verify('get_in_touch');
        $user = Auth::user();
        $detail = Contact::findById($id);
        return View::render(
            template:'user/get-in-touch/detail_get-in-touch/index',
            layout: 'layout/user/main',
            data: [
                'user' => $user,
                'detail' => $detail
            ]
        );
    }

    public function edit($user_seo, $id) {
        Authorization::verify('get_in_touch');
        $user = Auth::user();
        $detail = Contact::findById($id);
        $status = $_POST['status'];
        
        $detail->followUp = $status;
        $detail->save();

        Router::redirect('/u/'.$user->seo_user.'/get-in-touch/');
    }
}