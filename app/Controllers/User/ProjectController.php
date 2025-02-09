<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;
use App\Models\Project;
use App\Models\Lab;
use App\Services\Auth;

class ProjectController {
    public function listProject($user_seo) {
        
        $user = Auth::user()->id;
        $project = Project::findAllPerUser($user);
        return View::render(
            template:'user/project/listProject/index', 
            data:[
                'datatabel' => true,
                'alert'=> true,
                'listProject' => $project,
            ],
            layout: 'layout/user/main'
        );
    }
    public function deleteProject($user_seo) {
        
        $id = $_POST['id'];
        $user = Auth::user()->id;
        $equipment = Project::findById($id);
        if ($equipment != null) {
            $equipment->is_deleted = 1;
            $equipment->updated_by = $user;
            $equipment->save();
            $response['success'] = true;
            return json_encode($response);
        }
    }
    public function detailProject($user_seo) {
        
        $listLab = Lab::findAll();
        return View::render(
            template:'user/project/detailProject/index', 
            data:[
                'input_image'=> true,
                'input_longText' => true,
                'listLab' => $listLab
            ],
            layout: 'layout/user/main'
        );
    }

    public function AddProject($user_seo) {
        $nim = Auth::user()->nim;
        $name = $_POST['name']??null;
        $lab_id = $_POST['lab_id']??null;
        $desc = $_POST['descLong']??null;
        $seo = strlen($_POST['seo']) != 0 
            ? strtolower(str_replace([' ', '/'], ['-', '_'], $_POST['seo']))	 
            : strtolower(str_replace([' ', '/'], ['-', '_'], $name."-".$nim));
        $status = $_POST['status']??'';
        $created_by = Auth::user()->id;
        $banner = null;
        $labExist = Project::findBySeo($seo);
        if ($labExist) {
            $listLab = Lab::findAll();
            return View::render(
                template:'user/project/detailProject/index', 
                data:[
                    'edit_longForm' => true,
                    'input_image'=> true,
                    'errorSeo' => 'This seo lab already exist.',
                    'name' => $name??'',
                    'descLong' => $desc??'',
                    'seo' => $seo??'',
                    'status'=> $status,
                    'listLab' => $listLab
                ],
                layout: 'layout/user/main'
            );
        }

        if (!$name || !$desc || !$lab_id) {
            $listLab = Lab::findAll();
            return View::render(
                template:'user/project/detailProject/index', 
                data:[
                    'edit_longForm' => true,
                    'input_image'=> true,
                    'error' => 'Please fill in all the required fields.',
                    'name' => $name??'',
                    'descLong' => $desc??'',
                    'seo' => $seo??'',
                    'status'=> $status,
                    'listLab' => $listLab
                ],
                layout: 'layout/user/main'
            );
        }

        if (!empty($_FILES['banner']['name'])) {
            $bannerPath = Project::uploadFile($_FILES['banner'], 'assets/file/project/');
            $nameFile = explode('/', $bannerPath);
            $banner = end($nameFile);
        }

        $project = [
            'projects_name' => $name,
            'lab_id' => $lab_id,
            'user_id' => $created_by,
            'projects_banner'=> $banner??"default/banner-equipment-default.jpg",
            'projects_description' => $desc,
            'seo_projects' => $seo,
            'is_active' => $status,
            'created_by'=> $created_by
        ];
        $createProject = Project::create($project);
        if ($createProject != null) {
            Router::redirect('/u/'.$user_seo.'/project');
        }
        $listLab = Lab::findAll();
        return View::render(
            template:'user/project/detailProject/index', 
            data:[
                'edit_longForm' => true,
                'input_image'=> true,
                'error' => 'failed to create lab',
                'name' => $name,
                'descLong' => $desc,
                'seo' => $seo,
                'status'=> $status,
                'listLab' => $listLab
            ],
            layout: 'layout/user/main'
        );
    }

    public function editProject($user_seo, $project_seo ) {
        
        $listLab = Lab::findAll();
        $project = Project::findBySeo($project_seo);
        if ($project == null) {
            Router::redirect('/u/'.$user_seo.'/project');
        }
        return View::render(
            template:'user/project/detailProject/index', 
            data:[
                'edit_longForm' => true,
                'input_image'=> true,
                'project'=> $project,
                'listLab' => $listLab
            ],
            layout: 'layout/user/main'
        );
    }
    public function updateProject($user_seo, $project_seo ) {
        
        $name = $_POST['name']??null;
        $nim = Auth::user()->nim;
        $lab_id = $_POST['lab_id']??null;
        $desc = $_POST['descLong']??null;
        $seo = strlen($_POST['seo']) != 0 
            ? strtolower(str_replace([' ', '/'], ['-', '_'], $_POST['seo'])) 
            : strtolower(str_replace([' ', '/'], ['-', '_'], $name.'-'.$nim));
        $status = $_POST['status'];
        $updated_by = Auth::user()->id;
        $banner = null;
        if ($seo != $project_seo) {
            $listLab = Lab::findAll();
            $checkSeo = Project::findBySeo($seo);
            if ($checkSeo) {
                return View::render(
                    template:'user/project/detailProject/index', 
                    data:[
                        'edit_longForm' => true,
                        'input_image'=> true,
                        'errorSeo' => 'This seo lab already exist.',
                        'name' => $name??'',
                        'descLong' => $desc??'',
                        'seo' => $seo??'',
                        'status'=> $status,
                        'listLab' => $listLab
                    ],
                    layout: 'layout/user/main'
                );
            }
        }

        if (!$name || !$desc || !$lab_id) {
            $listLab = Lab::findAll();
            return View::render(
                template:'user/project/detailProject/index', 
                data:[
                    'edit_longForm' => true,
                    'input_image'=> true,
                    'error' => 'Please fill in all the required fields.',
                    'name' => $name??'',
                    'descLong' => $desc??'',
                    'seo' => $seo??'',
                    'status'=> $status,
                    'listLab' => $listLab
                ],
                layout: 'layout/user/main'
            );
        }

        if (!empty($_FILES['banner']['name'])) {
            $bannerPath = Project::uploadFile($_FILES['banner'], 'assets/file/project/');
            $nameFile = explode('/', $bannerPath);
            $banner = end($nameFile);
        }
        $project = Project::findBySeo($project_seo);
        if ($project != null) {
            $project->projects_name = strlen($name) > 0 ? $name : $project->projects_name;
            $project->projects_banner = isset($banner) ? $banner : $project->projects_banner;
            $project->projects_description = strlen($desc) > 0 ? $desc : $project->projects_description;
            $project->seo_projects = strlen($seo) > 0 ? $seo : $project->seo_projects;
            $project->is_active = strlen($status) > 0 ? $status : $project->is_active;
            $project->updated_by = $updated_by;

            $project->save();
            Router::redirect('/u/'.$user_seo.'/project');
        }
        $listLab = Lab::findAll();
        return View::render(
            template:'user/project/detailProject/index', 
            data:[
                'edit_longForm' => true,
                'input_image'=> true,
                'error' => 'failed to create equipment, check your connection and make sure seo is diferent with other equipment',
                'name' => $name,
                'descLong' => $desc,
                'seo' => $seo,
                'status'=> $status,
                'listLab' => $listLab
            ],
            layout: 'layout/user/main'
        );
    }
}