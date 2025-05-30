<?php
class Mahasiswa
{
    public $nama;
    public $nim;
    public function perkenalan()
    {
        return "Halo, nama saya " . $this->nama . " dan NIM saya " . $this->nim;
    }
}

$mahasiswa1 = new Mahasiswa();
$mahasiswa1->nama = "Budi";
$mahasiswa1->nim = "220001";
echo $mahasiswa1->perkenalan();
