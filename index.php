<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Input Pengajuan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Form Input Pengajuan Kredit</h1>
        <a href="dashboard.php" class="nav-link">Lihat Dashboard Approval</a>

        <?php
        // Tampilkan notifikasi jika ada
        if (isset($_GET['status']) && $_GET['status'] == 'sukses') {
            echo '<div class="alert alert-success">Pengajuan baru berhasil disimpan.</div>';
        }
        ?>

        <form action="simpan.php" method="POST">
            <label for="nama_konsumen">Nama Konsumen:</label>
            <input type="text" id="nama_konsumen" name="nama_konsumen" required>

            <label for="nik">NIK:</label>
            <input type="text" id="nik" name="nik" required maxlength="16">

            <label for="model_kendaraan">Model Kendaraan:</label>
            <input type="text" id="model_kendaraan" name="model_kendaraan" required>

            <label for="harga">Harga Kendaraan (Rp):</label>
            <input type="number" id="harga" name="harga" required>

            <button type="submit">Submit Pengajuan</button>
        </form>
    </div>
</body>
</html>