<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;
use App\Services\Auth;
use App\Models\labReservation;
use App\Models\Lab;
use App\Models\User;

class LabSubmissionController {
    public function listReservation ($user_seo)  {
        Authorization::verify('reservation');
        $user = Auth::user();
        $listReservation = labReservation::listRequest_student($user->id);
        $labolatory = Lab::findAll()??[];
        return View::render(
            template:'user/requester/labReservation/index', 
            data:[
                'datatabel' => true,
                'alert'=> true,
                'listReservation' => $listReservation,
                'labolatory' => $labolatory
                
            ],
            layout: 'layout/user/main'
        );
    }
    public function createReservation ($user_seo)  {
        Authorization::verify('reservation');
        $listLab = Lab::findAll()??[];
        $user = Auth::user();
        return View::render(
            template:'user/requester/labDetailReservation/index', 
            data:[
                'formWizzard' => true,
                'submission' => true,
                'descRequest' => true,
                'input_file' => true,
                'datatabel' => true,
                'alert'=> true,
                'stepRequest' => true,
                'user' => $user,	
                'listLab' => $listLab,
            ],
            layout: 'layout/user/main'
        );
    }
    public function AddReservation ($user_seo)  {
        Authorization::verify('reservation');
        $lab_id = $_POST['labolatory']??null;
        $start = $_POST['start']??null;
        $end = $_POST['end']??null;
        $desc = $_POST['desc']??null;
        $user = Auth::user()??null;
        $fileStudent = null;

        if (!empty($_FILES['student']['name'])) {
            $filePath = labReservation::uploadFile($_FILES['student'], 'assets/file/labReservation/');
            $nameFile = explode('/', $filePath);
            $fileStudent = end($nameFile);
        }
        $reservationLab = [
            'lab_id' => $lab_id,
            'user_id' => $user->id,
            'reservation_start' => $start,
            'reservation_end' => $end,
            'reservation_desc' => $desc,
            'reservation_listUser' => $fileStudent,
            'reservation_status' => 0,
            'created_by' => $user->id
        ];

        $createReservationLab = labReservation::create($reservationLab);

        if ($createReservationLab) {
            $response['success'] = true;
            return json_encode($response);
        }
        $response['success'] = false;
        return json_encode($response);
    }
    public function editReservation ($user_seo, $reservation_id)  {
        Authorization::verify('reservation');
        $listLab = Lab::findAll()??[];
        $user = Auth::user();
        $reservation = labReservation::getReservationById($reservation_id);
        if ($reservation == null) {
            Router::redirect('/u/'.$user->seo_user.'/reservation-lab');
        }
        $Requester = User::findById($reservation->user_id);
        $Approver = null;
        if ($reservation->reservation_approver != null && $reservation->reservation_approver != '') {
            $Approver = User::findById($reservation->reservation_approver);
        }
        return View::render(
            template:'user/requester/labDetailReservation/index', 
            data:[
                'formWizzard' => true,
                'submission' => true,
                'descRequest' => true,
                'input_file' => true,
                'datatabel' => true,
                'alert'=> true,
                'stepRequest' => true,
                'user' => $user,	
                'listLab' => $listLab,
                'reservation' => $reservation,
                'approver' => $Approver,
                'requester' => $Requester
            ],
            layout: 'layout/user/main'
        );
    }

    public function updateReservation ($user_seo, $reservation_id)  {
        Authorization::verify('reservation');
        $lab_id = $_POST['labolatory']??null;
        $start = $_POST['start']??null;
        $end = $_POST['end']??null;
        $desc = $_POST['desc']??'';
        $status = null;
        $descBefore = $_POST['descBefore']??null;
        $descAfter = $_POST['descAfter']??null;
        $fileStudent = null;
        $user = Auth::user();
        $reservation = labReservation::getReservationById($reservation_id);
        if ($reservation == null) {
            $response['success'] = false;
            return json_encode($response);
        }

        if (!empty($_FILES['student']['name'])) {
            $filePath = labReservation::uploadFile($_FILES['student'], 'assets/file/labReservation/');
            $nameFile = explode('/', $filePath);
            $fileStudent = end($nameFile);
        }
        if ($reservation->reservation_status == 3 && strlen($descBefore)>11){
            $status = 4;
        }
        elseif ($reservation->reservation_status == 4 && strlen($descAfter)>11){
            $status = 5;
        }
        elseif ($reservation->reservation_status == 5 && $_POST['status']) {
            $status = 6;
        }
        
        $reservation->lab_id = $lab_id??$reservation->lab_id;
        $reservation->reservation_desc = strlen($desc) != 0 ? $desc : $reservation->reservation_desc;
        $reservation->reservation_listUser = $fileStudent??$reservation->reservation_listUser;
        $reservation->reservation_start = $start??$reservation->reservation_start;
        $reservation->reservation_end = $end??$reservation->reservation_end;
        $reservation->reservation_status = $status??$reservation->reservation_status;
        $reservation->reservation_descBefore = $descBefore??$reservation->reservation_descBefore;
        $reservation->reservation_descAfter = $descAfter??$reservation->reservation_descAfter;
        $reservation->updated_by = $user->id;
        $reservation->updated_at = date('Y-m-d H:i:s');
        $reservation->save();
        $response['success'] = true;
        return json_encode($response);
    }
}