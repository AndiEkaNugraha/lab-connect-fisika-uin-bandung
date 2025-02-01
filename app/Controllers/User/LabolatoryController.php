<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;

class LabolatoryController {
    public function labolatory($user_seo) {
        Authorization::verify('edit_labolatorium');
        return View::render(
            template:'user/labolatory/index', 
            data:[],
            layout: 'layout/user/main'
        );
    }
}