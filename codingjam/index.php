<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
</head>
<body>
    <h2>Data Siswa</h2>
    <a href="add.php">+ Tambah Data</a> | 
    <a href="print.php" target="_blank"> Cetak</a>
    <br><br>
    <table border="1" cellpadding="10">
        <tr><th>No</th><th>Nama</th><th>Kelas</th><th>Aksi</th></tr>
        <?php
        $no = 1;
        $result = $conn->query("SELECT * FROM siswa");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['kelas'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
