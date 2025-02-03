<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;
use App\Models\Equipment;

class EquipmentController {
    public function listEquipment($user_seo) {
        Authorization::verify('edit_facility');
        $equipments = Equipment::findAll();
        return View::render(
            template:'user/equipment/listEquipment/index', 
            data:[
                'datatabel' => true,
                'alert'=> true,
                'listEquipments' => $equipments,
            ],
            layout: 'layout/user/main'
        );
    }
    public function detailEquipment($user_seo) {
        Authorization::verify('edit_facility');
        return View::render(
            template:'user/equipment/detailEquipment/index', 
            data:[
                'input_image'=> true,
                'input_longText' => true,
            ],
            layout: 'layout/user/main'
        );
    }
    public function createEquipment($user_seo) {
        Authorization::verify('edit_facility');
        return View::render(
            template:'user/equipment/detailEquipment/index', 
            data:[
                'edit_longForm' => true,
                'input_image'=> true,
            ],
            layout: 'layout/user/main'
        );
    }
}