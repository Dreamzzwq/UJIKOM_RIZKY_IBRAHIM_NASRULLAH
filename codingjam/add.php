<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<?php include 'koneksi.php';
if ($_POST) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $conn->query("INSERT INTO siswa (nama, kelas) VALUES ('$nama', '$kelas')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Siswa</title></head>
<body>
    <h2>Tambah Siswa</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" required><br><br>
        Kelas: <input type="text" name="kelas" required><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
