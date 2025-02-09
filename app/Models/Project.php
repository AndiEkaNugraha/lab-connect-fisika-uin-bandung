<?php

namespace App\Models;

use Core\App;
use Core\Model;

class Project extends Model {
  protected static string $table = 'projects';

  public $id;
  public $lab_id;
  public $user_id;
  public $projects_banner;
  public $projects_name;
  public $projects_description;
  public $seo_projects;
  public $is_active;
  public $is_deleted;
  public $created_at;
  public $updated_at;
  public $created_by;
  public $updated_by;

  public static function findAll(): array {
    $db = App::get('database');
    $result = $db->fetchAll(
      'SELECT * FROM projects WHERE is_deleted = 0 AND is_active = 1',
      [],
      static::class
    );
    return $result ? $result : [];
  }
  public static function findById(string $id): ?Project {
    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM projects WHERE id = ? AND is_deleted = 0', 
      [$id],
      static::class
    );
    return $result ? $result : null;
  }
  
  public static function findAllPerUser($id): array {
    $db = App::get('database');
    $result = $db->fetchAll(
      'SELECT * FROM projects WHERE user_id = ? AND is_deleted = 0',
      [$id],
      static::class
    );
    return $result ? $result : [];
  }
  public static function findBySeo(string $seo): ?Project {
    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM projects WHERE seo_projects = ? AND is_deleted = 0', 
      [$seo],
      static::class
    );
    return $result ? $result : null;
  }
  public static function search($search): array {
    $db = App::get('database');
    $result = $db->fetchAll(
        'SELECT * FROM projects WHERE (projects_name LIKE ? OR projects_description LIKE ?) AND is_active = 1 AND is_deleted = 0',
        ["%$search%", "%$search%"], // Menambahkan dua parameter
        static::class
    );
    return $result ?: []; // Lebih ringkas daripada `return $result ? $result : [];`
  }

}