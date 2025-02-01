<?php

namespace App\Models;

use Core\App;
use Core\Model;

class CategoryUser extends Model {
  protected static string $table = 'categoriesUsers';

  public $ROWID;
  public $id;
  public $name;
  public $created_at;
  public $updated_at;
  

  public static function findById(int $id): ?CategoryUser {
    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM categoriesUsers WHERE id = ?', 
      [$id],
      static::class
    );
    return $result ? $result : null;
  }
}