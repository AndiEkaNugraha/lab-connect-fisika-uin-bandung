<?php
namespace App\Controllers;

use App\Models\User;
use Core\View;
use App\Models\Lab;


class labolatoryController {
    public function index() {
        $listLab = Lab::findAll();
        return View::render(
            template:'labolatory/listLabolatory/index',
            layout: 'layout/general/main',
            data: [
                'listLab' => $listLab,
            ]
        );
    }
    public function detailLab($lab_seo) {
        $lab = Lab::findBySeo($lab_seo);
        return View::render(
            template:'labolatory/detailLabolatory/index',
            layout: 'layout/general/main',
            data: [
                'labDetail' => $lab,
            ]
        );
    }
}
