<?php
session_start();
include 'koneksi.php';

$nama = $_POST['nama'] ?? '';
$kelas = $_POST['kelas'] ?? '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("SELECT * FROM siswa WHERE nama = ? AND kelas = ?");
    $stmt->bind_param("ss", $nama, $kelas);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $nama;
        header("Location: index.php");
        exit;
    } else {
        $error = "Nama atau kelas salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login Siswa</title></head>
<body>
    <h2>Login Siswa</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        Nama: <input type="text" name="nama" required><br><br>
        Kelas: <input type="text" name="kelas" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
