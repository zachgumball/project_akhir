<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "project_akhir";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_buah = $_POST['id_buah'];
    $nama_buah = $_POST['nama_buah'];
    $harga_buah = $_POST['harga_buah'];

    $sql = "UPDATE buah SET nama_buah = '$nama_buah', harga_buah = '$harga_buah' WHERE id_buah = $id_buah";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diubah.";
    } else {
        echo "Error mengubah data: " . $conn->error;
    }
}

$conn->close();
?>
