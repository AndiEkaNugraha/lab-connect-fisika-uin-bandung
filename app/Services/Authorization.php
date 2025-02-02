<?php

namespace App\Services;

use App\Models\Post;
use Core\Router;

class Authorization {
  public static function verify(
    string $action, mixed $resource = null
  ): void {
    if (!static::check($action, $resource)) {
      Router::forbidden();
    }
  }

  public static function check(
    string $action, mixed $resource = null
  ): bool {
    $user = Auth::user();
    if (!$user) {
      return false;
    }

    // if (1 === $user->cat_id) {
    //   return true;
    // }

    return match($action) {
      'edit_labolatorium', 'edit_tools', 'edit_facility' => in_array(
        $user->cat_id, [2, 3]
      ),
      'edit_laboran', 'edit_dosen', 'user_manajemen' => in_array(
        $user->cat_id, [1]
      ),
      default => false
    };
  }
}