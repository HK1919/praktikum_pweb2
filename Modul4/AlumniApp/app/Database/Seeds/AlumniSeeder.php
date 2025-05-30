<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AlumniSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nim'         => '20230910088',
                'nama'        => 'Haikal Kamil',
                'jurusan'     => 'Sistem Informasi',
                'created_at'  => '2025-05-11',
                'updated_at'  => '2025-05-11'
            ],
            [
                'nim'         => '017006002',
                'nama'        => 'Milchatun',
                'jurusan'     => 'Teknik Informatika',
                'created_at'  => '2025-05-11',
                'updated_at'  => '2025-05-11'
            ]
        ];
        $this->db->table('tblalumni')->insertBatch($data);
    }
}
