<?php
namespace App\Controllers;

use App\Models\User;
use Core\View;
use App\Models\Lab;
use App\Models\Equipment;
use App\Models\Contact;
use Exception;

class ContactController {
    public function index() {
        return View::render(
            template:'contact/index',
            layout: 'layout/general/main',
            data: [
                'isContact' => true
            ]
        );
    }
    public function getInTouch() {
        try {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $message = $_POST['message'] ?? '';
            // Validasi input
            if (empty($name) || empty($email) || empty($phone)) {
                throw new Exception("Nama, email, dan nomor telepon wajib diisi", 400);
            }

            // Simpan data
            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'text' => $message
            ];
            $contact = Contact::create($data);
            
            if (!$contact) {
                // Gagal menyimpan data
                header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode([
                    'success' => false,
                    'message' => 'Gagal menambahkan data',
                    'error' => $contact
                ]);
                return;
            }

            // Kirim response sukses
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode([
                'success' => true,
                'message' => 'Pesan berhasil dikirim'
            ]);
        } catch (Exception $e) {
            // Tangani error
            header('Content-Type: application/json');
            http_response_code($e->getCode() ?: 500);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
