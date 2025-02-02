<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;

class LabolatoryController {
    public function listNews($user_seo) {
        Authorization::verify('edit_labolatorium');
        return View::render(
            template:'user/News/index.php', 
            data:[],
            layout: 'layout/user/main'
        );
    }
}