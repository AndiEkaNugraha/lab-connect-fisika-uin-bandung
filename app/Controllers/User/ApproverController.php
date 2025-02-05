<?php

namespace App\Controllers\User;
use App\Services\Authorization;
use Core\View;
use Core\Router;
use App\Services\Auth;
use App\Models\labReservation;
use App\Models\Lab;
use App\Models\User;

class ApproverController {
    public function listReservationLab ($user_seo) {
        Authorization::verify('approver');
        $user = User::all();
        $listReservation = labReservation::listReservation();
        $labolatory = Lab::findAll()??[];
        return View::render(
            template:'user/approver/labReservation/index', 
            data:[
                'datatabel' => true,
                'alert'=> true,
                'listReservation' => $listReservation,
                'labolatory' => $labolatory,
                'users' => $user
            ],
            layout: 'layout/user/main'
        );
    }
    public function detailReservationLab($user_seo, $reservation_id) {
        Authorization::verify('approver');
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
            template:'user/approver/labDetailReservation/index', 
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

    public function updateReservationLab($user_seo, $reservation_id) {
        Authorization::verify('approver');
        $approval = $_POST['approval']??null;
        $note = $_POST['note']??null;
        $user = Auth::user();
        if ($approval == null || $approval == '') {
            $reservation = labReservation::getReservationById($reservation_id);
            $listLab = Lab::findAll()??[];
            $Requester = User::findById($reservation->user_id);
            $Approver = null;
            if ($reservation->reservation_approver != null && $reservation->reservation_approver != '') {
                $Approver = User::findById($reservation->reservation_approver);
            }
            return View::render(
                template:'user/approver/labDetailReservation/index', 
                data:[
                    'formWizzard' => true,
                    'submission' => true,
                    'input_longText' => true,
                    'input_file' => true,
                    'datatabel' => true,
                    'alert'=> true,
                    'stepRequest' => true,
                    'reservation' => $reservation,
                    'users' => $user,
                    'listLab' => $listLab,
                    'requester' => $Requester,
                    'approver' => $Approver,
                    'error_approver' => 'Approval is required'
                ],
                layout: 'layout/user/main'
            );
        }
        $reservation = labReservation::getReservationById($reservation_id);
        if ($reservation == null) {
            Router::redirect('/u/'.$user_seo.'/lab-reservation');
        }
        $reservation->reservation_approver = $user->id;
        $reservation->reservation_status = $approval;
        $reservation->reservation_note = $note;
        $reservation->save();
        Router::redirect('/u/'.$user_seo.'/lab-reservation');
    }
} 