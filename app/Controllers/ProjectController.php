<?php
namespace App\Controllers;

use App\Models\User;
use Core\View;
use App\Models\Equipment;
use App\Models\Project;
use App\Models\Lab;

class ProjectController {
    public function index() {
        $listProject = Project::findAll();
        $listLab = Lab::findAll();
        return View::render(
            template:'project/listProject/index',
            layout: 'layout/general/main',
            data: [
                'listProject' => $listProject,
                'listLab' => $listLab,
                'isProject' => true
            ]
        );
    }
    public function detailEquipment($project_seo) {
        $project = Project::findBySeo($project_seo);

        return View::render(
            template:'project/detailProject/index',
            layout: 'layout/general/main',
            data: [
                'project' => $project,
                'isProject' => true
            ]
        );
    }
}
