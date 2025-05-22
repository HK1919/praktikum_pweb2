<?php
class Pegawai
{
    public $nama;
    public $jabatan;
    public $gaji;

    public function __construct($nama, $jabatan, $gaji)
    {
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->gaji = $gaji;
    }

    public function infoPegawai()
    {
        return "Nama: $this->nama, Jabatan: $this->jabatan, Gaji: $this->gaji";
    }
}

$pegawai = new Pegawai("Haikal Kamil", "Manager", 5000000);
echo $pegawai->infoPegawai();
