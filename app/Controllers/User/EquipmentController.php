<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;

class EquipmentController {
    public function listEquipment($user_seo) {
        // Authorization::verify('edit_tools');
        return View::render(
            template:'user/equipment/index', 
            data:[],
            layout: 'layout/user/main'
        );
    }
}