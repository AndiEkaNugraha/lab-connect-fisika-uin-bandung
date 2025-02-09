<?php

namespace Core;
use Exception;
abstract class Model {
  protected static string $table;
  public $id;

  public static function all(): array {
    $db = App::get('database');
    return $db->fetchAll("SELECT * FROM " . static::$table, [], static::class);
  }

  public static function uploadFile(array $file, string $uploadDir = 'uploads/'): ?string {
    // Pastikan folder tujuan ada
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Periksa apakah ada kesalahan dalam upload
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return null; // Gagal upload
    }

    // Ambil nama asli file
    $originalFileName = basename($file['name']);

    // Buat path tujuan
    $filePath = $uploadDir . $originalFileName;

    // Jika file dengan nama yang sama sudah ada, tambahkan timestamp
    if (file_exists($filePath)) {
        $fileInfo = pathinfo($originalFileName);
        $fileNameWithoutExt = $fileInfo['filename'];
        $fileExt = $fileInfo['extension'];
        $filePath = $uploadDir . $fileNameWithoutExt . '_' . time() . '.' . $fileExt;
    }

    // Pindahkan file ke folder tujuan
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        return $filePath; // Kembalikan path file yang tersimpan
    }

    return null; // Jika gagal
}


  public static function find(mixed $id): ?static {
    $db = App::get('database');
    return $db->fetch("SELECT * FROM " . static::$table . " WHERE id = ?", [$id], static::class);
  }

  // public static function create(array $data): static {
  //   var_dump($data);
  //   $db = App::get('database');
  //   // 1) Get the names of columns inside $data
  //   $columns = implode(', ', array_keys($data));
  //   // -> id, title, created_at, content
  //   $placeholders = implode(', ', array_fill(0, count($data), '?'));
  //   // -> ?, ?, ?, ?
  //   $sql = "INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)";
  //   $db->query($sql, array_values($data));
  //   var_dump($placeholders);
  //   return static::find($db->lastInsertId());
  // }

public static function create(array $data): static|null {
    $db = App::get('database');

    // Pastikan ID ada (karena pakai UUID)
    if (!isset($data['id'])) {
        $data['id'] = self::generateUUID();
    }

    // Hilangkan field kosong (optional)
    $data = array_filter($data, fn($value) => $value !== null && $value !== "");
    // Buat query INSERT
    $columns = implode(', ', array_keys($data));
    $placeholders = implode(', ', array_fill(0, count($data), '?'));

    $sql = "INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)";
    try {
      $db->query($sql, array_values($data));
      return static::find($data['id']); // Kembalikan data yang berhasil disimpan
  } catch (Exception $e) {
      error_log("Error creating user: " . $e->getMessage()); // Log error untuk debugging
      return null; // Kembalikan null jika gagal
  }
}

// Fungsi untuk generate UUID
private static function generateUUID(): string {
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}


  public function save(): static {
    $db = App::get('database');
    $data = get_object_vars($this);

    if (!isset($this->id)) {
      unset($data['id']);
      return static::create($data);
    }

    unset($data['id']);
    $setParts = array_map(
      fn($column) => "$column = ?", 
      array_keys($data)
    );
    $sql = "UPDATE " 
      . static::$table 
      . " SET " 
      . implode(', ', $setParts) 
      . " WHERE id = ?";
    $params = array_values($data);
    $params[] = $this->id;
    $db->query($sql, $params);
    return $this;
  }

  public function delete(): void {
    if (!isset($this->id)) {
      return;
    }

    $db = App::get('database');
    $sql = "DELETE FROM " . static::$table . " WHERE id = ?";
    $db->query($sql, [$this->id]);
  }

  public static function getRecent(
    ?int $limit = null, 
    ?int $page = null
  ) {
    /** @var \Core\Database $db */
    $db = App::get('database');
    $query = "SELECT * FROM " . static::$table;
    $params = [];
    $query .= " ORDER BY created_at DESC";

    if ($limit !== null) {
      $query .= " LIMIT ?";
      $params[] = $limit;
    }

    if ($page !== null && $limit !== null) {
      $offset = ($page - 1) * $limit;
      $query .= " OFFSET ?";
      $params[] = $offset;
    }

    return $db->fetchAll($query, $params, static::class);
  }

  public static function count(): int {
    /** @var \Core\Database $db */
    $db = App::get('database');
    $query = "SELECT COUNT(*) FROM " . static::$table;
    return (int) $db->query($query, [])->fetchColumn();
  }
}