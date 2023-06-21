<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "project_akhir";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

$id_buah = $_POST['id_buah'];
$nama_buah = $_POST['nama_buah'];
$harga_buah = $_POST['harga_buah'];

if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_destination = 'uploads/' . $gambar;

    if (move_uploaded_file($gambar_tmp, $gambar_destination)) {
        $sql = "INSERT INTO buah (id_buah, nama_buah, harga_buah, gambar) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $id_buah, $nama_buah, $harga_buah, $gambar_destination);

        if ($stmt->execute()) {
            echo 'Kamu berhasil menyimpan data';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to move the uploaded image to the destination folder.";
    }
} else {
    echo "No image uploaded or an error occurred during upload.";
}

$conn->close();
?>
