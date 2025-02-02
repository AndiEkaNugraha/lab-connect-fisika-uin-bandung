<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;
use App\Services\Auth;
use App\Models\Lab;

class LabController {
    public function listLab($user_seo) {
        Authorization::verify('edit_facility');
        $labs = Lab::findAll();
        return View::render(
            template:'user/lab/listLab/index', 
            data:[
                'datatabel' => true,
                'listLabs'=> $labs,
                'alert'=> true,
            ],
            layout: 'layout/user/main'
        );
    }
    public function deleteLab($user_seo) {
        Authorization::verify('edit_facility');
        $id = $_POST['id'];
        $user = Auth::user()->id;
        $lab = Lab::findById($id);
        if ($lab != null) {
            $lab->is_deleted = 1;
            $lab->updated_by = $user;
            $lab->save();
            $response['success'] = true;
            return json_encode($response);
        }
    }
    public function createLab($user_seo) {
        Authorization::verify('edit_facility');
        return View::render(
            template:'user/lab/detailLab/index', 
            data:[
                'edit_longForm' => true,
                'input_image'=> true,
            ],
            layout: 'layout/user/main'
        );
    }
    public function addLab($user_seo) {
        Authorization::verify('edit_facility');
        $name = $_POST['name'];
        $desc = $_POST['descLong'];
        $seo = strlen($_POST['seo']) != 0 ? $_POST['seo'] : strtolower(str_replace(' ','-', $name));
        $status = $_POST['status'];
        $created_by = Auth::user()->id;
        $banner = null;
        
        $labExist = Lab::findBySeo($seo);
        if ($labExist) {
            return View::render(
                template:'user/lab/detailLab/index', 
                data:[
                    'edit_longForm' => true,
                    'input_image'=> true,
                    'errorSeo' => 'This seo lab already exist.',
                    'name' => $name??'',
                    'descLong' => $desc??'',
                    'seo' => $seo??'',
                    'status'=> $status,
                ],
                layout: 'layout/user/main'
            );
        }

        if (!$name || !$desc) {
            return View::render(
                template:'user/lab/detailLab/index', 
                data:[
                    'edit_longForm' => true,
                    'input_image'=> true,
                    'error' => 'Please fill in all the required fields.',
                    'name' => $name??'',
                    'descLong' => $desc??'',
                    'seo' => $seo??'',
                    'status'=> $status,
                ],
                layout: 'layout/user/main'
            );
        }

        if (!empty($_FILES['banner']['name'])) {
            $bannerPath = Lab::uploadFile($_FILES['banner'], 'assets/file/lab/');
            $nameFile = explode('/', $bannerPath);
            $banner = end($nameFile);
        }

        $lab = [
            'lab_name' => $name,
            'lab_banner'=> $banner??"default/banner-lab-default.jpg",
            'lab_description' => $desc,
            'seo_lab' => $seo,
            'is_active' => $status,
            'created_by'=> $created_by
        ];
        $createLab = Lab::create($lab);
        if ($createLab != null) {
            Router::redirect('/u/'.$user_seo.'/lab');
        }
        return View::render(
            template:'user/lab/detailLab/index', 
            data:[
                'edit_longForm' => true,
                'input_image'=> true,
                'error' => 'failed to create lab',
                'name' => $name,
                'descLong' => $desc,
                'seo' => $seo,
                'status'=> $status,
            ],
            layout: 'layout/user/main'
        );
    }
    public function editLab($user_seo, $lab_seo ) {
        Authorization::verify('edit_facility');
        $lab = Lab::findBySeo($lab_seo);
        return View::render(
            template:'user/lab/detailLab/index', 
            data:[
                'edit_longForm' => true,
                'input_image'=> true,
                'lab'=> $lab,
            ],
            layout: 'layout/user/main'
        );
    }
    public function updateLab($user_seo, $lab_seo ) {
        Authorization::verify('edit_facility');
        $name = $_POST['name'];
        $desc = $_POST['descLong'];
        $seo = strlen($_POST['seo']) != 0 ? $_POST['seo'] : strtolower(str_replace(' ','-', $name));
        $status = $_POST['status'];
        $updated_by = Auth::user()->id;
        $banner = null;

        if ($seo != $lab_seo) {
            $checkSeo = Lab::findBySeo($seo);
            if ($checkSeo) {
                return View::render(
                    template:'user/lab/detailLab/index', 
                    data:[
                        'edit_longForm' => true,
                        'input_image'=> true,
                        'errorSeo' => 'This seo lab already exist.',
                        'name' => $name??'',
                        'descLong' => $desc??'',
                        'seo' => $seo??'',
                        'status'=> $status,
                    ],
                    layout: 'layout/user/main'
                );
            }
        }

        if (!$name || !$desc) {
            return View::render(
                template:'user/lab/detailLab/index', 
                data:[
                    'edit_longForm' => true,
                    'input_image'=> true,
                    'error' => 'Please fill in all the required fields.',
                    'name' => $name??'',
                    'descLong' => $desc??'',
                    'seo' => $seo??'',
                    'status'=> $status,
                ],
                layout: 'layout/user/main'
            );
        }

        if (!empty($_FILES['banner']['name'])) {
            $bannerPath = Lab::uploadFile($_FILES['banner'], 'assets/file/lab/');
            $nameFile = explode('/', $bannerPath);
            $banner = end($nameFile);
        }
        $lab = Lab::findBySeo($lab_seo);
        if ($lab != null) {
            $lab->lab_name = strlen($name) > 0 ? $name : $lab->lab_name;
            $lab->lab_banner = isset($banner) ? $banner : $lab->lab_banner;
            $lab->lab_description = strlen($desc) > 0 ? $desc : $lab->lab_description;
            $lab->seo_lab = strlen($seo) > 0 ? $seo : $lab->seo_lab;
            $lab->is_active = strlen($status) > 0 ? $status : $lab->is_active;
            $lab->updated_by = $updated_by;

            $lab->save();
            Router::redirect('/u/'.$user_seo.'/lab');
        }
        return View::render(
            template:'user/lab/detailLab/index', 
            data:[
                'edit_longForm' => true,
                'input_image'=> true,
                'error' => 'failed to create lab, check your connection and make sure seo is diferent with other lab',
                'name' => $name,
                'descLong' => $desc,
                'seo' => $seo,
                'status'=> $status,
            ],
            layout: 'layout/user/main'
        );
    }
}