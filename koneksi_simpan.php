<?php
$id_buah = $_POST['id_buah'];
$nama_buah = $_POST['nama_buah'];
$harga_buah = $_POST['harga_buah'];

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "project_akhir";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Menyimpan data barang
$sql = "INSERT INTO buah (id_buah, nama_buah,  harga_buah) VALUES ('$id_buah', '$nama_buah','$harga_buah')";

if ($conn->query($sql) === TRUE) {
    echo 'Kamu berhasil menyimpan data';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>