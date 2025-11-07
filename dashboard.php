<?php
// Sertakan file config
include 'config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Approval</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Dashboard Approval</h1>
        <a href="index.php" class="nav-link">Input Pengajuan Baru</a>

        <h2>Menunggu Persetujuan (Pending)</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Konsumen</th>
                    <th>Model</th>
                    <th>Harga (Rp)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query untuk mengambil data yang statusnya 'Pending'
                $sql_pending = "SELECT id, nama_konsumen, model_kendaraan, harga FROM pengajuan WHERE status = 'Pending' ORDER BY tanggal_pengajuan ASC";
                $result_pending = $koneksi->query($sql_pending);
                
                if ($result_pending->num_rows > 0) {
                    // Tampilkan data per baris
                    while($row = $result_pending->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nama_konsumen"] . "</td>";
                        echo "<td>" . $row["model_kendaraan"] . "</td>";
                        echo "<td>" . number_format($row["harga"], 0, ',', '.') . "</td>";
                        echo "<td>
                                <form action='approve.php' method='POST' style='margin:0;'>
                                    <input type='hidden' name='id_pengajuan' value='" . $row["id"] . "'>
                                    <button type'submit' class='btn-approve'>Approve</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data pengajuan yang menunggu persetujuan.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Sudah Disetujui (Approved)</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Konsumen</th>
                    <th>Model</th>
                    <th>Harga (Rp)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query untuk mengambil data yang statusnya 'Approved'
                $sql_approved = "SELECT id, nama_konsumen, model_kendaraan, harga, status FROM pengajuan WHERE status = 'Approved' ORDER BY tanggal_pengajuan DESC";
                $result_approved = $koneksi->query($sql_approved);
                
                if ($result_approved->num_rows > 0) {
                    // Tampilkan data per baris
                    while($row = $result_approved->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nama_konsumen"] . "</td>";
                        echo "<td>" . $row["model_kendaraan"] . "</td>";
                        echo "<td>" . number_format($row["harga"], 0, ',', '.') . "</td>";
                        echo "<td><span class='status-approved'>" . $row["status"] . "</span></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Belum ada data pengajuan yang disetujui.</td></tr>";
                }
                
                // Tutup koneksi
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>