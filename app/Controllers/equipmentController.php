<?php
namespace App\Controllers;

use App\Models\User;
use Core\View;
use App\Models\Equipment;
use App\Models\Lab;

class equipmentController {
    public function index() {
        $listEquipment = Equipment::findAll();
        $listLab = Lab::findAll();
        return View::render(
            template:'equipment/listEquipment/index',
            layout: 'layout/general/main',
            data: [
                'listEquipment' => $listEquipment,
                'listLab' => $listLab
            ]
        );
    }
    public function detailEquipment($equipment_seo) {
        $equipment = Equipment::findBySeo($equipment_seo);

        return View::render(
            template:'equipment/detailEquipment/index',
            layout: 'layout/general/main',
            data: [
                'equipment' => $equipment,
            ]
        );
    }
}
