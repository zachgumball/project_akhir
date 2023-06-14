<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_akhir";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data buah Jeruk
$jeruk = "SELECT harga_buah FROM buah WHERE id_buah = 'A01'";
$result_jeruk = $conn->query($jeruk);

if ($result_jeruk->num_rows > 0) {
    $row = $result_jeruk->fetch_assoc();
    $harga_jeruk = $row["harga_buah"];
} else {
    $harga_jeruk = "N/A";
}

// Mengambil data buah Anggur
$anggur = "SELECT harga_buah FROM buah WHERE id_buah = 'A02'";
$result_anggur = $conn->query($anggur);

if ($result_anggur->num_rows > 0) {
    $row = $result_anggur->fetch_assoc();
    $harga_anggur = $row["harga_buah"];
} else {
    $harga_anggur = "N/A";
}

// Mengambil data buah Apel
$apel = "SELECT harga_buah FROM buah WHERE id_buah = 'A03'";
$result_apel = $conn->query($apel);

if ($result_apel->num_rows > 0) {
    $row = $result_apel->fetch_assoc();
    $harga_apel = $row["harga_buah"];
} else {
    $harga_apel = "N/A";
}

// Mengambil data buah Nanas
$nanas = "SELECT harga_buah FROM buah WHERE id_buah = 'A04'";
$result_nanas = $conn->query($nanas);

if ($result_nanas->num_rows > 0) {
    $row = $result_nanas->fetch_assoc();
    $harga_nanas = $row["harga_buah"];
} else {
    $harga_nanas = "N/A";
}

// Mengambil data buah Alpukat
$alpukat = "SELECT harga_buah FROM buah WHERE id_buah = 'A05'";
$result_alpukat = $conn->query($alpukat);

if ($result_alpukat->num_rows > 0) {
    $row = $result_alpukat->fetch_assoc();
    $harga_alpukat = $row["harga_buah"];
} else {
    $harga_alpukat = "N/A";
}

// Mengambil data buah Pepaya
$pepaya = "SELECT harga_buah FROM buah WHERE id_buah = 'A06'";
$result_pepaya = $conn->query($pepaya);

if ($result_pepaya->num_rows > 0) {
    $row = $result_pepaya->fetch_assoc();
    $harga_pepaya = $row["harga_buah"];
} else {
    $harga_pepaya = "N/A";
}
?>