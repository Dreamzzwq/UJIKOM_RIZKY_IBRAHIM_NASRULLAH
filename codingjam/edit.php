<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<?php include 'koneksi.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM siswa WHERE id=$id");
$data = $result->fetch_assoc();

if ($_POST) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $conn->query("UPDATE siswa SET nama='$nama', kelas='$kelas' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Siswa</title></head>
<body>
    <h2>Edit Siswa</h2>
    <form method="POST">
        Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>
        Kelas: <input type="text" name="kelas" value="<?= $data['kelas'] ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
