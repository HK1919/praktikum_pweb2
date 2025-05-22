<?php
class Alumni
{
    public $nama;
    public $jurusan;
    public function __construct($nama, $jurusan)
    {
        $this->nama = $nama;
        $this->jurusan = $jurusan;
    }
    public function tampilkanProfil()
    {
        return "Nama: $this->nama <br> Jurusan: $this->jurusan";
    }
}
$alumni = new Alumni("Asgevara Maqarav Zarba", "Teknik Informatika");
echo $alumni->tampilkanProfil();
