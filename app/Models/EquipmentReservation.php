<?php

namespace App\Models;

use Core\App;
use Core\Model;

class EquipmentReservation extends Model {
  protected static string $table = 'reservationsEquipment';

  public $id;
  public $equipment_id;
  public $user_id;
  public $reservation_desc;
  public $reservation_listUser;
  public $reservation_start;
  public $reservation_end;
  public $reservation_approver;
  public $reservation_cancel;
  public $reservation_note;
  public $reservation_amount;
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
      'SELECT * FROM reservationsEquipment WHERE user_id = ?', 
      [$id_user],
      static::class
    );
    return $result ? $result : [];
  }
  public static function getReservationById($id_reservation): ?EquipmentReservation {
    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM reservationsEquipment WHERE id = ?', 
      [$id_reservation],
      static::class
    );
    return $result ? $result : null;
  }
  public static function onGoing($startTime, $endTime, $id): int {
    $db = App::get('database');
    $result = $db->fetchAll(
        'SELECT SUM(reservation_amount) as total 
        FROM reservationsEquipment 
        WHERE equipment_id = ? 
        AND reservation_status IN (3,4,5) 
        AND (
            (reservation_start BETWEEN ? AND ?) 
            OR (reservation_end BETWEEN ? AND ?) 
            OR (reservation_start <= ? AND reservation_end >= ?)
        )', 
        [$id, $startTime, $endTime, $startTime, $endTime, $startTime, $endTime]
    );
    return $result[0]['total'] ?? 0; // Jika hasilnya null, kembalikan 0
  }

  public static function listReservation (): array {
    $db = App::get('database');
    $result = $db->fetchAll(
      'SELECT * FROM reservationsEquipment', 
      [],
      static::class
    );
    return $result ? $result : [];
  }
}