<?php

namespace App\Models;

use Core\App;
use Core\Model;

class Contact extends Model {
  protected static string $table = 'contact';

  public $id;
  public $email;
  public $name;
  public $phone;
  public $text;
  public $followUp;
  public $created_at;
  public $updated_at;

  public static function findAll(): array {
    $db = App::get('database');
    $result = $db->fetchAll(
      'SELECT * FROM contact',
      [],
      static::class
    );
    return $result ? $result : [];
  }
  public static function findById(string $id): ?Contact {
    $db = App::get('database');
    $result = $db->fetch(
      'SELECT * FROM contact WHERE id = ?', 
      [$id],
      static::class
    );
    return $result ? $result : null;
  }
}