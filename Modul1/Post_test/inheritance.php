<?php
class Hewan
{
    public $nama;
    public function makan()
    {
        return "$this->nama sedang makan.";
    }
}

class Kucing extends Hewan
{
    public function bersuara()
    {
        return "$this->nama mengongong.";
    }
}
