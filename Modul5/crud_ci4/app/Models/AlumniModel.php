<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    protected $table            = 'tblalumni';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nim', 'nama', 'jurusan', 'angkatan'];
    protected $useTimestamps    = true;
}
