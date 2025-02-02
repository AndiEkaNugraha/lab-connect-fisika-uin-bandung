<?php
require_once __DIR__ . "/../bootstrap.php";

use App\Models\User;
use App\Models\CategoryUser;
use Core\App;

$users = [[
    'name' => 'Super Admin',
    'cat_id' => "1",
    "nim"=> 0,
    "phone" => 0,
    "email"=> "super@admin.co",
    "image"=> "",
    "hash_password"=> password_hash("@Pass123", PASSWORD_DEFAULT),
    "seo_user"=> "super-admin",
],
[
    'name' => 'Super Admin2',
    'cat_id' => "1",
    "nim"=> 0,
    "phone" => 0,
    "email"=> "super2@admin.co",
    "image"=> "",
    "hash_password"=> password_hash("@Pass123", PASSWORD_DEFAULT),
    "seo_user"=> "super-admin2",
],
[
    'name' => 'Laboran 1',
    'cat_id' => "2",
    "nim"=> 1,
    "phone" => 1,
    "email"=> "laboran@mail.com",
    "image"=> "",
    "hash_password"=> password_hash("@KATAkata123", PASSWORD_DEFAULT),
    "seo_user"=> "laboran-1",
]
];

$categoryUsers = [
    [
        "id" => "1",
        "name"=> "Super Admin",
    ],
    [
        "id" => "2",
        "name"=> "Laboran",
    ],
    [
        "id" => "3",
        "name"=> "Dosen",
    ],
    [    
        "id" => "4",
        "name"=> "Mahasiswa",
    ]
];

$db = App::get("database");

$db->query("DELETE FROM users");
$db->query("DELETE FROM categoriesUsers");
$db->query("DELETE FROM remember_tokens");
foreach ($categoryUsers as $categoryUser) {
    CategoryUser::create($categoryUser);
}
foreach ($users as $user) {
    User::create($user);
}



echo "Fixtures loaded successfully.\n";