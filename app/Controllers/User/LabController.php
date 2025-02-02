<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;

class LabController {
    public function listNews($user_seo) {
        Authorization::verify('edit_facility');
        return View::render(
            template:'user/News/index.php', 
            data:[],
            layout: 'layout/user/main'
        );
    }
}