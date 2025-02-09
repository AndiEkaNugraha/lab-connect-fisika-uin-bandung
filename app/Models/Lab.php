<?php

namespace App\Models;

use Core\App;
use Core\Model;

class Lab extends Model {
  protected static string $table = 'labs';

  public $id;
  public $lab_banner;
  public $lab_name;
  public $lab_description;
  public $seo_lab;
  public $is_active;
  public $is_deleted;
  public $created_at;
  public $updated_at;
  public $created_by;
  public $updated_by;

  public static function findAll(): array {
    $db = App::get('database');
    $result = $db->fetchAll(
      'SELECT * FROM labs WHERE is_deleted = ?',
      [0],
      static::class
    );
    return $result ? $result : [];
  }
  public static function findBySeo(string $seo): ?Lab {
    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM labs WHERE seo_lab = ? AND is_deleted = 0', 
      [$seo],
      static::class
    );
    return $result ? $result : null;
  }
  public static function findById(string $id): ?Lab {
    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM labs WHERE id = ? AND is_deleted = 0', 
      [$id],
      static::class
    );
    return $result ? $result : null;
  }
  public static function checkAllBySeo(string $seo): array {
    $db = App::get('database');
    $result = $db->fetchAll(
      'SELECT * FROM labs WHERE seo_lab = ? AND is_deleted = 0',
      [$seo],
      static::class
    );
    return $result ? $result : [];
  }
  public static function search($search): array {
    $db = App::get('database');
    $result = $db->fetchAll(
      'SELECT * FROM labs WHERE (lab_name LIKE ? OR lab_description LIKE ?) AND is_active = 1 AND is_deleted = 0',
      ["%$search%", "%$search%"], // Menambahkan dua parameter
      static::class
    );
    return $result ?: []; // Lebih ringkas daripada `return $result ? $result : [];`
  }
}