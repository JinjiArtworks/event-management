<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function run()
    {
        $data = [
            [
                'name' => 'Jinji',
                'email' => 'jinji@gmail.com',
                'password' => password_hash('jinji', PASSWORD_BCRYPT),
            ],
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => password_hash('admin', PASSWORD_BCRYPT),
            ],
        ];
        $this->userModel->insertBatch($data);
    }
}
