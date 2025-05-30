<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KawanController extends Controller
{
    public function show($nama)
    {
        return 'Nama Anda Adalah: ' . $nama;
    }

    public function getBiodata()
    {
        $biodata = [
            [
                'nim' => '20230910088',
                'nama' => 'Haikal Kamil',
                'kelas' => 'SINFC-2023-04'
            ],
            [
                'nim' => '017006002',
                'nama' => 'Milchatun',
                'kelas' => 'TINFC-2001-01'
            ]
        ];
        return view('biodata.index', compact('biodata'));
    }
}
