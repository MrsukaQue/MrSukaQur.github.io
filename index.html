<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_login_app";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Membuat database jika belum ada
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === TRUE) {
    // echo "Database berhasil dibuat atau sudah ada\n";
} else {
    echo "Error membuat database: " . $conn->error . "\n";
}

// Memilih database
$conn->select_db($dbname);

// Membuat tabel users jika belum ada
$sql_create_table = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql_create_table) === TRUE) {
    // echo "Tabel users berhasil dibuat atau sudah ada\n";
} else {
    echo "Error membuat tabel: " . $conn->error . "\n";
}

// Mengembalikan objek koneksi
return $conn;
?>