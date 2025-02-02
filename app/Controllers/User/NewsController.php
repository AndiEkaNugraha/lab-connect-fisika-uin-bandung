<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;

class NewsController {
    public function labolatory($user_seo) {
        return View::render(
            template:'user/labolatory/index', 
            data:[],
            layout: 'layout/user/main'
        );
    }
}