<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;
use App\Models\Equipment;
use App\Models\Lab;
use App\Services\Auth;

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
        $listLab = Lab::findAll();
        return View::render(
            template:'user/equipment/detailEquipment/index', 
            data:[
                'input_image'=> true,
                'input_longText' => true,
                'listLab' => $listLab
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

    public function AddEquipment($user_seo) {
        Authorization::verify('edit_facility');
        $name = $_POST['name'];
        $lab_id = $_POST['lab_id'];
        $desc = $_POST['descLong'];
        $stock = $_POST['stock']??'0';
        $damaged = $_POST['damaged']??'0';
        $seo = strlen($_POST['seo']) != 0 ? $_POST['seo'] : strtolower(str_replace(' ','-', $name));
        $status = $_POST['status'];
        $created_by = Auth::user()->id;
        $banner = null;
        
        $labExist = Equipment::findBySeo($seo);
        if ($labExist) {
            $listLab = Lab::findAll();
            return View::render(
                template:'user/equipment/detailEquipment/index', 
                data:[
                    'edit_longForm' => true,
                    'input_image'=> true,
                    'errorSeo' => 'This seo lab already exist.',
                    'name' => $name??'',
                    'descLong' => $desc??'',
                    'stock' => $stock??'',
                    'damaged' => $damaged??'',
                    'seo' => $seo??'',
                    'status'=> $status,
                    'listLab' => $listLab
                ],
                layout: 'layout/user/main'
            );
        }

        if (!$name || !$desc) {
            $listLab = Lab::findAll();
            return View::render(
                template:'user/equipment/detailEquipment/index', 
                data:[
                    'edit_longForm' => true,
                    'input_image'=> true,
                    'error' => 'Please fill in all the required fields.',
                    'name' => $name??'',
                    'descLong' => $desc??'',
                    'stock' => $stock??'',
                    'damaged' => $damaged??'',
                    'seo' => $seo??'',
                    'status'=> $status,
                    'listLab' => $listLab
                ],
                layout: 'layout/user/main'
            );
        }

        if (!empty($_FILES['banner']['name'])) {
            $bannerPath = Equipment::uploadFile($_FILES['banner'], 'assets/file/equipment/');
            $nameFile = explode('/', $bannerPath);
            $banner = end($nameFile);
        }

        $equipment = [
            'equipments_name' => $name,
            'lab_id' => $lab_id,
            'equipments_banner'=> $banner??"default/banner-equipment-default.jpg",
            'equipments_description' => $desc,
            'equipments_stock' => $stock,
            'equipments_damaged' => $damaged,
            'seo_equipment' => $seo,
            'is_active' => $status,
            'created_by'=> $created_by
        ];
        $createEquipment = Equipment::create($equipment);
        if ($createEquipment != null) {
            Router::redirect('/u/'.$user_seo.'/lab-equipment');
        }
        $listLab = Lab::findAll();
        return View::render(
            template:'user/equipment/detailEquipment/index', 
            data:[
                'edit_longForm' => true,
                'input_image'=> true,
                'error' => 'failed to create lab',
                'name' => $name,
                'descLong' => $desc,
                'stock' => $stock,
                'damaged' => $damaged,
                'seo' => $seo,
                'status'=> $status,
                'listLab' => $listLab
            ],
            layout: 'layout/user/main'
        );
    }
}