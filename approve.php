<?php
// Sertakan file config
include 'config.php';

// Cek apakah data dikirim via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil ID pengajuan dari form
    $id_pengajuan = $_POST['id_pengajuan'];
    
    // Query Update
    $sql = "UPDATE pengajuan SET status = 'Approved' WHERE id = ?";
    
    $stmt = $koneksi->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $koneksi->error);
    }
    
    // Bind parameter ke query
    $stmt->bind_param("i", $id_pengajuan);
    
    // Eksekusi query
    if ($stmt->execute()) {
        // Jika berhasil, redirect kembali ke dashboard.php
        header("Location: dashboard.php");
    } else {
        // Jika gagal, tampilkan error
        echo "Error: " . $stmt->error;
    }
    
    // Tutup statement dan koneksi
    $stmt->close();
    $koneksi->close();
    
} else {
    // Jika file diakses langsung, redirect ke dashboard.php
    header("Location: dashboard.php");
}
exit;
?>