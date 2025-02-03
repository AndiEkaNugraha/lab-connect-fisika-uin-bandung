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
        
        if ($damaged > $stock){
            $listLab = Lab::findAll();
            return View::render(
                template:'user/equipment/detailEquipment/index', 
                data:[
                    'edit_longForm' => true,
                    'input_image'=> true,
                    'errorDamaged' => 'The number of damaged items cannot be more than stock.',
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

    public function editEquipment($user_seo, $equipment_seo ) {
        Authorization::verify('edit_facility');
        $listLab = Lab::findAll();
        $equipment = Equipment::findBySeo($equipment_seo);
        if ($equipment == null) {
            Router::redirect('/u/'.$user_seo.'/lab-equipment');
        }
        return View::render(
            template:'user/equipment/detailEquipment/index', 
            data:[
                'edit_longForm' => true,
                'input_image'=> true,
                'equipment'=> $equipment,
                'listLab' => $listLab
            ],
            layout: 'layout/user/main'
        );
    }
    public function updateEquipment($user_seo, $equipment_seo ) {
        Authorization::verify('edit_facility');
        $name = $_POST['name'];
        $lab_id = $_POST['lab_id'];
        $desc = $_POST['descLong'];
        $stock = $_POST['stock']??'0';
        $damaged = $_POST['damaged']??'0';
        $seo = strlen($_POST['seo']) != 0 ? strtolower(str_replace(' ','-',$_POST['seo'])) : strtolower(str_replace(' ','-', $name));
        $status = $_POST['status'];
        $updated_by = Auth::user()->id;
        $banner = null;

        if ($damaged > $stock){
            $listLab = Lab::findAll();
            return View::render(
                template:'user/equipment/detailEquipment/index', 
                data:[
                    'edit_longForm' => true,
                    'input_image'=> true,
                    'errorDamaged' => 'The number of damaged items cannot be more than stock.',
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

        if ($seo != $equipment_seo) {
            $listLab = Lab::findAll();
            $checkSeo = Equipment::findBySeo($seo);
            if ($checkSeo) {
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
        }

        if (!$name || !$desc || !$lab_id) {
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
        $equipment = Equipment::findBySeo($equipment_seo);
        if ($equipment != null) {
            $equipment->equipments_name = strlen($name) > 0 ? $name : $equipment->equipments_name;
            $equipment->equipments_banner = isset($banner) ? $banner : $equipment->equipments_banner;
            $equipment->equipments_description = strlen($desc) > 0 ? $desc : $equipment->equipments_description;
            $equipment->equipments_stock = strlen($stock) > 0 ? $stock : $equipment->equipments_stock;
            $equipment->equipments_damaged = strlen($damaged) > 0 ? $damaged : $equipment->equipments_damaged;
            $equipment->seo_equipment = strlen($seo) > 0 ? $seo : $equipment->seo_equipment;
            $equipment->is_active = strlen($status) > 0 ? $status : $equipment->is_active;
            $equipment->updated_by = $updated_by;

            $equipment->save();
            Router::redirect('/u/'.$user_seo.'/lab-equipment');
        }
        $listLab = Lab::findAll();
        return View::render(
            template:'user/equipment/detailEquipment/index', 
            data:[
                'edit_longForm' => true,
                'input_image'=> true,
                'error' => 'failed to create equipment, check your connection and make sure seo is diferent with other equipment',
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