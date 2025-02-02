<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;

class LabController {
    public function listLab($user_seo) {
        Authorization::verify('edit_facility');
        return View::render(
            template:'user/labolatory/index', 
            data:[
                'input_image'=> true,
                'input_longText' => true,
            ],
            layout: 'layout/user/main'
        );
    }
}