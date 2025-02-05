<?php

namespace App\Models;

use Core\App;
use Core\Model;

class User extends Model {
  protected static string $table = 'users';

  public $id;
  public $cat_id;
  public $name;
  public $nim;
  public $phone;
  public $mobile;
  public $email;
  public $avatar;
  public $major;
  public $bio;
  public $address;
  public $instagram;
  public $facebook;
  public $twitter;
  public $linkedin;
  public $hash_password;
  public $seo_user;
  public $is_active;
  public $is_deleted;
  public $created_at;
  public $updated_at;
  
  public static function CategoriesUserLaboran(): string {
    return '4';
  }
  public static function findByEmail(string $email): ?User {
    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM users WHERE email = ?', 
      [$email],
      static::class
    );
    return $result ? $result : null;
  }

  public static function findByNim(string $nim): ?User {
    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM users WHERE nim = ?', 
      [$nim],
      static::class
    );
    return $result ? $result : null;
  }
  public static function findByCat(string $cat): array {
    $db = App::get('database');
    $result = $db->fetchAll(
      'SELECT * FROM users WHERE cat_id = ? and is_deleted = 0', 
      [$cat],
      static::class
    );
    return $result ? $result : [];
  }
  public static function findById(string $id): ?User {
    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM users WHERE id = ?', 
      [$id],
      static::class
    );
    return $result ? $result : null;
  }
}