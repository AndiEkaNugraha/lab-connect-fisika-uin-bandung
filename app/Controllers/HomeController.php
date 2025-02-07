<?php
namespace App\Controllers;

use App\Models\User;
use Core\View;


class HomeController {
    public function index() { 
        $user = User::findByEmail("super2@admin.co");
        return View::render(
            template:'home/index',
            layout: 'layout/general/main',
            data:['recentUsers'=> $user]
        );
    }
}
