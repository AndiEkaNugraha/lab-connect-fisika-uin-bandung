<?php

namespace App\Models;

use Core\App;
use Core\Model;

class labReservation extends Model {
  protected static string $table = 'reservationsLab';

  public $id;
  public $lab_id;
  public $user_id;
  public $reservation_desc;
  public $reservation_listUser;
  public $reservation_start;
  public $reservation_end;
  public $reservation_approver;
  public $reservation_cancel;
  public $reservation_note;
  public $reservation_status;
  public $reservation_descBefore;
  public $reservation_descAfter;
  public $created_at;
  public $updated_at;
  public $created_by;
  public $updated_by;

  public static function listRequest_student($id_user): array {
    $db = App::get('database');
    $result = $db->fetchAll(
      'SELECT * FROM reservationsLab WHERE user_id = ?', 
      [$id_user],
      static::class
    );
    return $result ? $result : [];
  }
  public static function getReservationById($id_reservation): ?labReservation {
    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM reservationsLab WHERE id = ?', 
      [$id_reservation],
      static::class
    );
    return $result ? $result : null;
  }
}