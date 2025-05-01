<?php

namespace App\Models;

use Core\App;
use Core\Model;

class MasterMeasurementExperiment extends Model {
  protected static string $table = 'masterMeasurementExperiment';

  public $id;
  public $lab_id;
  public $masterMeasurement_banner;
  public $masterMeasurement_label;
  public $masterMeasurement_description;
  public $is_active;
  public $is_deleted;
  public $created_at;
  public $updated_at;
  public $created_by;
  public $updated_by;

  public static function findAll(): array {
    $db = App::get('database');
    $result = $db->fetchAll(
      'SELECT * FROM masterMeasurementExperiment WHERE is_deleted = ?',
      [0],
      static::class
    );
    return $result ? $result : [];
  }
  public static function findById($id) {

    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM masterMeasurementExperiment WHERE id = ? AND is_deleted = 0', 
      [$id],
      static::class
    );
    return $result ? $result : null;
  }
}