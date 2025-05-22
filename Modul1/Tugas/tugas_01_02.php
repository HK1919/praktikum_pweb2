<?php
class Hewan
{
    public $nama;
    public function makan()
    {
        return "$this->nama sedang makan.";
    }
}

class Anjing extends Hewan
{
    public function bersuara()
    {
        return "$this->nama menggonggong.";
    }
}

class Kucing extends Hewan
{
    public function bersuara()
    {
        return "$this->nama mengeong.";
    }
}

$anjing = new Anjing();
$anjing->nama = "Bobby";
echo $anjing->makan();
echo $anjing->bersuara();

$kucing = new Kucing();
$kucing->nama = "Kitty";
echo $kucing->makan();
echo $kucing->bersuara();
