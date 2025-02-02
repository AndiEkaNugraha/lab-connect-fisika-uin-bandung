<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;

class EquipmentController {
    public function listEquipment($user_seo) {
        Authorization::verify('edit_facility');
        return View::render(
            template:'user/equipment/index', 
            data:[
                'input_image'=> true,
                'input_longText' => true,
            ],
            layout: 'layout/user/main'
        );
    }
}