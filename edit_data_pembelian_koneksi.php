<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "project_akhir";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $id_pembelian = $_POST["id_pembelian"];
    $nama_pembeli = $_POST["nama_pembeli"];
    $alamat_pembeli = $_POST["alamat_pembeli"];
    $id_buah = $_POST["id_buah"];
    $nama_buah = $_POST["nama_buah"];
    $harga_buah = $_POST["harga_buah"];
    $jumlah_pembelian = $_POST["jumlah_pembelian"];

    // Update the data in the database
    $sql = "UPDATE data_pembelian SET nama_pembeli = ?, alamat_pembeli = ?, id_buah = ?, nama_buah = ?, harga_buah = ?, jumlah_pembelian = ? WHERE id_pembelian = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdss", $nama_pembeli, $alamat_pembeli, $id_buah, $nama_buah, $harga_buah, $jumlah_pembelian, $id_pembelian);

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
