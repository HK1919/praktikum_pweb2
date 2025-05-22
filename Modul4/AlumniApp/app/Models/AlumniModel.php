<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    protected $table            = 'alumni'; // Nama tabel dari Modul 4
    protected $primaryKey       = 'id'; // Kolom primary key 
    protected $allowedFields    = ['nama', 'email', 'jurusan', 'angkatan', 'no_hp', 'alamat']; // Kolom yang diizinkan untuk diisi
    protected $useTimestamps    = true; // Menggunakan created_at dan updated_at
}
