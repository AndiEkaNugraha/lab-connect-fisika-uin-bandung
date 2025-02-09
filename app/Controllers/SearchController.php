<?php
namespace App\Controllers;

use App\Models\User;
use Core\View;
use App\Models\Equipment;
use App\Models\Project;
use App\Models\Lab;

class SearchController {
    public function index() {
        $search = $_GET['q'] ?? '';
        $listProject = Project::search($search);
        $listLab = Lab::search($search);
        $listEquipment = Equipment::search($search);
        return View::render(
            template:'search/index',
            layout: 'layout/general/main',
            data: [
                'listProject' => $listProject,
                'listLab' => $listLab,
                'listEquipment' => $listEquipment,
                'search' => $search
            ]
        );
    }
}