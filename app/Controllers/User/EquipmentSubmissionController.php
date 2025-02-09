<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;
use App\Services\Auth;
use App\Models\EquipmentReservation;
use App\Models\Equipment;
use App\Models\User;

class EquipmentSubmissionController {
    public function listReservation ($user_seo)  {
        Authorization::verify('reservation');
        $user = Auth::user();
        $listReservation = EquipmentReservation::listRequest_student($user->id);
        $equipment = Equipment::findAll()??[];
        return View::render(
            template:'user/requester/equipmentReservation/index', 
            data:[
                'datatabel' => true,
                'alert'=> true,
                'listReservation' => $listReservation,
                'equipments' => $equipment
                
            ],
            layout: 'layout/user/main'
        );
    }
    public function createReservation ($user_seo)  {
        Authorization::verify('reservation');
        $listEquipment = Equipment::available()??[];
        $user = Auth::user();
        return View::render(
            template:'user/requester/equipmentDetailReservation/index', 
            data:[
                'formWizzard' => true,
                'submission' => true,
                'descRequest' => true,
                'input_file' => true,
                'datatabel' => true,
                'alert'=> true,
                'stepRequest' => true,
                'user' => $user,	
                'listEquipment' => $listEquipment,
            ],
            layout: 'layout/user/main'
        );
    }
    public function AddReservation ($user_seo)  {
        Authorization::verify('reservation');
        $equipment_id = $_POST['equipment']??null;
        $amount = $_POST['amount']??null;
        $start = $_POST['start']??null;
        $end = $_POST['end']??null;
        $desc = $_POST['desc']??null;
        $user = Auth::user()??null;
        $fileStudent = null;

        $onGoingEquipmentReservation = EquipmentReservation::onGoing($start,$end,$equipment_id);
        $amount_now = Equipment::amountAvailable($equipment_id)??0;
        $amount_now = $amount_now - $onGoingEquipmentReservation;

        if ($amount > $amount_now) {
            $response['success'] = false;
            $response['message'] = 'Stock tinggal '.$amount_now;
            $response['status'] = '500';
            return json_encode($response);
        }
 
        if (!empty($_FILES['student']['name'])) {
            $filePath = EquipmentReservation::uploadFile($_FILES['student'], 'assets/file/equipmentReservation/');
            $nameFile = explode('/', $filePath);
            $fileStudent = end($nameFile);
        }
        $reservationEquipment = [
            'equipment_id' => $equipment_id,
            'user_id' => $user->id,
            'reservation_start' => $start,
            'reservation_end' => $end,
            'reservation_desc' => $desc,
            'reservation_amount' => $amount,
            'reservation_listUser' => $fileStudent,
            'reservation_status' => 0,
            'created_by' => $user->id
        ];

        $createReservationLab = EquipmentReservation::create($reservationEquipment);

        if ($createReservationLab) {
            $response['success'] = true;
            $response['message'] = 'Berhasil menambahkan reservasi';
            $response['status'] = '200';
            return json_encode($response);
        }
        $response['success'] = false;
        $response['message'] = 'Gagal menambahkan reservasi';
        $response['status'] = '500';
        return json_encode($response);
    }
    public function editReservation ($user_seo, $reservation_id)  {
        Authorization::verify('reservation');
        $listEquipment = Equipment::findAll()??[];
        $user = Auth::user();
        $reservation = EquipmentReservation::getReservationById($reservation_id);
        if ($reservation == null) {
            Router::redirect('/u/'.$user->seo_user.'/reservation-equipment');
        }
        $Requester = User::findById($reservation->user_id);
        $Approver = null;
        if ($reservation->reservation_approver != null && $reservation->reservation_approver != '') {
            $Approver = User::findById($reservation->reservation_approver);
        }
        return View::render(
            template:'user/requester/EquipmentDetailReservation/index', 
            data:[
                'formWizzard' => true,
                'submission' => true,
                'descRequest' => true,
                'input_file' => true,
                'datatabel' => true,
                'alert'=> true,
                'stepRequest' => true,
                'user' => $user,	
                'listEquipment' => $listEquipment,
                'reservation' => $reservation,
                'approver' => $Approver,
                'requester' => $Requester
            ],
            layout: 'layout/user/main'
        );
    }

    public function updateReservation ($user_seo, $reservation_id)  {
        Authorization::verify('reservation');
        $equipment_id = $_POST['equipment']??null;
        $start = $_POST['start']??null;
        $end = $_POST['end']??null;
        $desc = $_POST['desc']??'';
        $status = $_POST['status']??null;
        $note = $_POST['note']??null;
        $amount = $_POST['amount']??null;
        $descBefore = $_POST['descBefore']??null;
        $descAfter = $_POST['descAfter']??null;
        $fileStudent = null;
        $user = Auth::user();
        $reservation = EquipmentReservation::getReservationById($reservation_id);
        if ($reservation == null) {
            $response['success'] = false;
            $response['status'] = '500';
            $response['message'] = 'Reservasi tidak ditemukan';
            return json_encode($response);
        }

        if ($status < 3) {
            $onGoingEquipmentReservation = EquipmentReservation::onGoing($start,$end,$equipment_id);
            $amount_now = Equipment::amountAvailable($equipment_id)??0;
            $amount_now = $amount_now - $onGoingEquipmentReservation;

            if ($amount > $amount_now) {
                $response['success'] = false;
                $response['message'] = 'Stock tinggal '.$amount_now;
                $response['status'] = '500';
                return json_encode($response);
            }
        }

        if (!empty($_FILES['student']['name'])) {
            $filePath = EquipmentReservation::uploadFile($_FILES['student'], 'assets/file/equipmentReservation/');
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
        
        $reservation->equipment_id = $equipment_id??$reservation->equipment_id;
        $reservation->reservation_desc = strlen($desc) != 0 ? $desc : $reservation->reservation_desc;
        $reservation->reservation_listUser = $fileStudent??$reservation->reservation_listUser;
        $reservation->reservation_start = $start??$reservation->reservation_start;
        $reservation->reservation_end = $end??$reservation->reservation_end;
        $reservation->reservation_status = $status??$reservation->reservation_status;
        $reservation->reservation_descBefore = $descBefore??$reservation->reservation_descBefore;
        $reservation->reservation_descAfter = $descAfter??$reservation->reservation_descAfter;
        $reservation->updated_by = $user->id;
        $reservation->reservation_note = $note??$reservation->reservation_note;
        $reservation->reservation_amount = $amount??$reservation->reservation_amount;
        $reservation->updated_at = date('Y-m-d H:i:s');
        $reservation->save();
        $response['success'] = true;
        $response['status'] = '200';
        $response['message'] = 'Berhasil memperbarui reservasi';
        if ($status == 2) {
            return Router::redirect( '/u/'.$user->seo_user.'/reservation-equipment');
        }
        return json_encode($response);
    }
    public function cancelReservation ($user_seo, $reservation_id) {
        Authorization::verify('reservation');
        $status = 2;
        $note = $_POST['note']??null;
        $reservation = EquipmentReservation::getReservationById($reservation_id);
        $user = Auth::user();
        if ($reservation == null) {
            return Router::redirect('/u/'.$user->seo_user.'/reservation-equipment');
        }
        $reservation->reservation_note = $note??$reservation->reservation_note;
        $reservation->updated_by = $user->id;
        $reservation->reservation_status = $status??$reservation->reservation_status;
        $reservation->save();
        return Router::redirect('/u/'.$user->seo_user.'/reservation-equipment');
    }
}