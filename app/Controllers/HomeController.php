<?php
namespace App\Controllers;

use App\Models\User;
use Core\View;
use App\Models\Lab;
use App\Models\Equipment;

class HomeController {
    public function index() {
        $listEquipment = Equipment::getRecent(5);
        $listLab = Lab::findAll();
        return View::render(
            template:'home/index',
            layout: 'layout/general/main',
            data: [
                'listLab' => $listLab,
                'listEquipment' => $listEquipment,
                'isHome' => true
            ]
        );
    }
}
