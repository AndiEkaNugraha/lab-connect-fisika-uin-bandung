<?php

namespace App\Models;

use Core\App;
use Core\Model;

class Equipment extends Model {
  protected static string $table = 'equipments';

  public $id;
  public $lab_id;
  public $equipments_banner;
  public $equipments_name;
  public $equipments_description;
  public $equipments_stock;
  public $seo_equipment;
  public $equipments_damaged;
  public $is_active;
  public $is_deleted;
  public $created_at;
  public $updated_at;
  public $created_by;
  public $updated_by;
  
  public static function findAll(): array {
    $db = App::get('database');
    $result = $db->fetchAll(
      'SELECT * FROM equipments WHERE is_deleted = ?',
      [0],
      static::class
    );
    return $result ? $result : [];
  }
  public static function findBySeo(string $seo): ?Equipment {
    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM equipments WHERE seo_equipment = ?', 
      [$seo],
      static::class
    );
    return $result ? $result : null;
  }
}