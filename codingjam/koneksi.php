<?php
$host = "localhost";
$user = "root";
$pass = "rizkynolimit";
$db   = "codingjam";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
