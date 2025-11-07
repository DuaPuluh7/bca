<?php
// Pengaturan koneksi database
$host = 'localhost';   
$user = 'root';        
$pass = '';           
$db   = 'db_kredit';   

// Membuat koneksi
$koneksi = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Mengatur timezone
date_default_timezone_set('Asia/Jakarta');
?>