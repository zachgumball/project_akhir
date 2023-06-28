<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_akhir";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$nama_pembeli = $_POST['nama_pembeli'];
$alamat_pembeli = $_POST['alamat_pembeli'];
$id_buah = $_POST['id_buah'];
$jumlah_pembelian = $_POST['jumlah_pembelian'];

$sql = "SELECT nama_buah, harga_buah FROM buah WHERE id_buah = '$id_buah'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama_buah = $row['nama_buah'];
    $harga_buah = $row['harga_buah'];
} else {
    echo "Error: Invalid id_buah.";
    exit;
}

$sql = "INSERT INTO data_pembelian (nama_pembeli, alamat_pembeli, id_buah, nama_buah, harga_buah, jumlah_pembelian)
        VALUES ('$nama_pembeli', '$alamat_pembeli', '$id_buah', '$nama_buah', '$harga_buah', '$jumlah_pembelian')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Data pembelian berhasil disimpan."); window.location = "index.php";</script>';
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
