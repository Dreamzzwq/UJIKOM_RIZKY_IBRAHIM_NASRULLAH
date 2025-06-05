<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data</title>
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <h2>Data Siswa</h2>
    <button onclick="window.print()" class="no-print">Print Sekarang</button><br><br>
    <table border="1" cellpadding="10">
        <tr><th>No</th><th>Nama</th><th>Kelas</th></tr>
        <?php
        $no = 1;
        $result = $conn->query("SELECT * FROM siswa");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['kelas'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
