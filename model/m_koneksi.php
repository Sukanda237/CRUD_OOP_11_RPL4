<?php

class koneksi
{

    // value dari properti dibawah disesuaikan dengan studi kasus kalian 
    private $host = "localhost", //di hp ganti menjadi 127.0.0.1
        $username = "root",
        $pass = "", //di hp password nya root
        $db = "11_rpl_4_2025_6";
    public $koneksi;

    // membuat konstrak yang dimana fungsi ini akan dijalankan otomatis ketika kita membuat objek dari kelas koneksi 
    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->pass, $this->db, 3306);

        if ($this->koneksi) {
            // echo "koneksi kedatabse " . $this->db . " berhasil";

            // mengembalikan nilai true jika koneksi kedatabasenya berhasil 
            return $this->koneksi;
        } else {
            echo "koneksi kedatabase gagal";
        }
    }
}

$koneksi = new koneksi();
