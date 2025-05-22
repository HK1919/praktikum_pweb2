<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Haikal Kamil',
                'email' => 'haikal@example.com',
            ],
            [
                'nama' => 'Ani Wijaya',
                'email' => 'ani@example.com',
            ],
        ];

        $this->db->table('mahasiswa')->insertBatch($data);
    }
}
