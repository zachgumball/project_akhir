<h1>TABEL DATA BUAH</h1>
<hr width="60%" color="red" align="left">
<style>
    table {
        border-collapse: collapse;
        width: 60%;
    }

    th,td {
        padding: 4px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "project_akhir";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

$sql = "SELECT id_buah, nama_buah, harga_buah FROM buah";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>ID Buah</th><th>Nama Buah</th><th>Harga Buah</th><th></th><th></th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_buah'] . '</td>';
        echo '<td>' . $row['nama_buah'] . '</td>';
        echo '<td>' . $row['harga_buah'] . '</td>';
        echo '<td><a href="edit_data.php?id_buah=' . $row['id_buah'] . '">Edit</a></td>';
        echo '<td><a href="hapus.php?id_buah=' . $row['id_buah'] . '">Hapus</a></td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'Tidak ada data yang ditemukan.';
}

$conn->close();
?>
<hr width="60%" color="red" align="left">
