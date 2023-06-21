<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "project_akhir";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

if (isset($_GET['id_buah'])) {
    $id_buah = $_GET['id_buah'];

    $sql = "DELETE FROM buah WHERE id_buah = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_buah);

    if ($stmt->execute()) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();

header("Location: show_table.php");
exit();
?>
