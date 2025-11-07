<?php
include 'config.php';

// Cek apakah data dikirim via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil data dari form
    $nama_konsumen = $_POST['nama_konsumen'];
    $nik = $_POST['nik'];
    $model_kendaraan = $_POST['model_kendaraan'];
    $harga = $_POST['harga'];
    
    // Siapkan query SQL untuk INSERT (menggunakan prepared statements untuk keamanan)
    $sql = "INSERT INTO pengajuan (nama_konsumen, nik, model_kendaraan, harga, status) VALUES (?, ?, ?, ?, 'Pending')";
    
    $stmt = $koneksi->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $koneksi->error);
    }
    
    // Bind parameter ke query
    // s = string, d = double (untuk harga)
    $stmt->bind_param("sssd", $nama_konsumen, $nik, $model_kendaraan, $harga);
    
    // Eksekusi query
    if ($stmt->execute()) {
        // Jika berhasil, redirect kembali ke index.php dengan status sukses
        header("Location: index.php?status=sukses");
    } else {
        // Jika gagal, tampilkan error
        echo "Error: " . $stmt->error;
    }
    
    // Tutup statement dan koneksi
    $stmt->close();
    $koneksi->close();
    
} else {
    // Jika file diakses langsung, redirect ke index.php
    header("Location: index.php");
}
exit;
?>