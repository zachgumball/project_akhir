<h1>Tabel Mahasiswa</h1>
<hr width="60%" color="red" align="left">
<style>
    table {
        border-collapse: collapse;
        width: 60%;
    }

    th,
    td {
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

$search = $_GET['search'] ?? '';

$sql = "SELECT id_buah, nama_buah, harga_buah FROM buah WHERE nama_buah LIKE '%$search%'  OR id_buah LIKE '%$search'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>ID_buah</th><th>Nama Buah</th><th>Harga Buah</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_buah'] . '</td>';
        echo '<td>' . $row['nama_buah'] . '</td>';
        echo '<td>' . $row['harga_buah'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'Tidak ada data yang ditemukan.';
}

$conn->close();
?>
<hr width="60%" color="red" align="left">
