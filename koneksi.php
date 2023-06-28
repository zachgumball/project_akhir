<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_akhir";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data buah
$ambil = "SELECT harga_buah FROM buah WHERE id_buah = 'A01'";
$result = $conn->query($ambil);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $harga = $row["harga_buah"];
} else {
    $harga = "N/A";
}
$ambil = "SELECT harga_buah FROM buah WHERE id_buah = 'A02'";
$result = $conn->query($ambil);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $harga = $row["harga_buah"];
} else {
    $harga = "N/A";
}
$ambil = "SELECT harga_buah FROM buah WHERE id_buah = 'A03'";
$result = $conn->query($ambil);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $harga = $row["harga_buah"];
} else {
    $harga = "N/A";
}
$ambil = "SELECT harga_buah FROM buah WHERE id_buah = 'A04'";
$result = $conn->query($ambil);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $harga = $row["harga_buah"];
} else {
    $harga = "N/A";
}
$ambil = "SELECT harga_buah FROM buah WHERE id_buah = 'A05'";
$result = $conn->query($ambil);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $harga = $row["harga_buah"];
} else {
    $harga = "N/A";
}
$ambil = "SELECT harga_buah FROM buah WHERE id_buah = 'A06'";
$result = $conn->query($ambil);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $harga = $row["harga_buah"];
} else {
    $harga = "N/A";
}

?>