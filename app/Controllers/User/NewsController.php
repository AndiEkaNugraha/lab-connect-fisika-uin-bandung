<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;

class NewsController {
    public function listNews($user_seo) {
        return View::render(
            template:'user/News/index', 
            data:[
                'input_image'=> true,
                'input_longText' => true,
            ],
            layout: 'layout/user/main'
        );
    }
}