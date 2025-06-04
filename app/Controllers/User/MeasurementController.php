<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;
use App\Models\MasterMeasurementExperiment;
use App\Models\Lab;
use App\Services\Auth;

class MeasurementController {
    public function listProject($user_seo) {
        $user = Auth::user()->id;
        $experiment = MasterMeasurementExperiment::findAll();
        return View::render(
            template:'user/measurement/listMeasurement/index', 
            data:[
                'datatabel' => true,
                'alert'=> true,
                'listExperiment' => $experiment,
            ],
            layout: 'layout/user/main'
        );
    }
    public function deleteProject($user_seo) {
        
        $id = $_POST['id'];
        $user = Auth::user()->id;
        $equipment = MasterMeasurementExperiment::findById($id);
        if ($equipment != null) {
            $equipment->is_deleted = 1;
            $equipment->updated_by = $user;
            $equipment->save();
            $response['success'] = true;
            return json_encode($response);
        }

        $response['success'] = true;
        return json_encode($response);
    }
    public function detailProject($user_seo) {
        $user = Auth::user()->id;
        $listLab = Lab::findAll();
        return View::render(
            template:'user/measurement/detailMeasurement/index',
            data:[
                'input_image'=> true,
                'input_longText' => true,
                'listLab' => $listLab
            ],
            layout: 'layout/user/main'
        );
    }

    public function AddProject($user_seo) {
        $name = $_POST['name']??null;
        $lab_id = $_POST['lab_id']??null;
        $desc = $_POST['descLong']??null;
        $status = $_POST['status']??'';
        $created_by = Auth::user()->id;
        $banner = null;

        if (!$name || !$desc || !$lab_id) {
            $_SESSION['data']['lab_id'] = $lab_id;
            $_SESSION['data']['name'] = $name;
            $_SESSION['data']['descLong'] = $desc;
            $_SESSION['data']['status'] = $status;
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Please fill all required fields';
            Router::redirect('/u/'.$user_seo.'/measurement/create');
        }
        $_SESSION['data'] = [];
        $_SESSION['status'] = null;
        $_SESSION['message'] = null;

        if (!empty($_FILES['banner']['name'])) {
            $bannerPath = MasterMeasurementExperiment::uploadFile($_FILES['banner'], 'assets/file/measurement/');
            $nameFile = explode('/', $bannerPath);
            $banner = end($nameFile);
        }

        $project = [
            'masterMeasurement_label' => $name,
            'lab_id' => $lab_id,
            'masterMeasurement_banner'=> $banner??"default/banner-equipment-default.jpg",
            'masterMeasurement_description' => $desc,
            'is_active' => $status,
            'created_by'=> $created_by
        ];
        
        $createProject = MasterMeasurementExperiment::create($project);
        if ($createProject != null) {
            Router::redirect('/u/'.$user_seo.'/measurement');
        }

        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'failed to create equipment, please try again';
        Router::redirect('/u/'.$user_seo.'/measurement/create');
    }

    public function editProject($user_seo, $id ) {
        
        $listLab = Lab::findAll();
        $measurement = MasterMeasurementExperiment::findById($id);
        if ($measurement == null) {
            Router::redirect('/u/'.$user_seo.'/project');
        }
        return View::render(
            template:'user/measurement/detailMeasurement/index', 
            data:[
                'datatabel' => true,
                'edit_longForm' => true,
                'input_image'=> true,
                'measurement'=> $measurement,
                'listLab' => $listLab
            ],
            layout: 'layout/user/main'
        );
    }
    public function updateProject($user_seo, $id ) {
        
        $name = $_POST['name']??null;
        $lab_id = $_POST['lab_id']??null;
        $desc = $_POST['descLong']??null;
        $status = $_POST['status'];
        $updated_by = Auth::user()->id;
        $banner = null;

        if (!$name || !$desc || !$lab_id) {
            $_SESSION['data']['lab_id'] = $lab_id;
            $_SESSION['data']['name'] = $name;
            $_SESSION['data']['descLong'] = $desc;
            $_SESSION['data']['status'] = $status;
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Please fill all required fields';
            Router::redirect('/u/'.$user_seo.'/measurement/create');
        }
        $_SESSION['data'] = [];
        $_SESSION['status'] = null;
        $_SESSION['message'] = null;

        if (!empty($_FILES['banner']['name'])) {
            $bannerPath = MasterMeasurementExperiment::uploadFile($_FILES['banner'], 'assets/file/measurement/');
            $nameFile = explode('/', $bannerPath);
            $banner = end($nameFile);
        }

        $measurement = MasterMeasurementExperiment::findById($id);

        if ($measurement != null) {
            $measurement->masterMeasurement_label = strlen($name) > 0 ? $name : $measurement->masterMeasurement_label;
            $measurement->masterMeasurement_banner = isset($banner) ? $banner : $measurement->masterMeasurement_banner;
            $measurement->masterMeasurement_description = strlen($desc) > 0 ? $desc : $measurement->masterMeasurement_description;
            $measurement->is_active = strlen($status) > 0 ? $status : $measurement->is_active;
            $measurement->updated_by = $updated_by;

            $measurement->save();
            Router::redirect('/u/'.$user_seo.'/measurement');
        }

        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'failed to create equipment, please try again';
        Router::redirect('/u/'.$user_seo.'/measurement/create');
    }
}