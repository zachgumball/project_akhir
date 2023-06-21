<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "project_akhir";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

if (isset($_POST['id_buah']) && isset($_POST['nama_buah']) && isset($_POST['harga_buah'])) {
    $id_buah = $_POST['id_buah'];
    $nama_buah = $_POST['nama_buah'];
    $harga_buah = $_POST['harga_buah'];

    // Handle the image upload
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    if (file_exists($targetFile)) {
        echo "Sorry, file tidak ada.";
        $uploadOk = 0;
    }

    if ($_FILES["gambar"]["size"] > 500000) {
        echo "Sorry, file terlalu besar.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp") {
        echo "Sorry, hanya JPG, JPEG, PNG, WEBP & GIF yang dibolehkan.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, file kamu tidak ter-upload.";
    
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
            echo "The file ". basename( $_FILES["gambar"]["name"]). " has been uploaded.";
            
            $sql = "UPDATE buah SET nama_buah = ?, harga_buah = ?, gambar = ? WHERE id_buah = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $nama_buah, $harga_buah, $targetFile, $id_buah);
            $stmt->execute();
            echo "Berhasil di update.";
        } else {
            echo "Sorry, ada error saat mengubah data kamu.";
        }
    }
} else {
    echo 'Invalid request.';
}

$conn->close();
?>
