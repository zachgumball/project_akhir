<h1>TABEL EDIT BUAH</h1>
<hr width="35%" color="red" align="left">
<style>
    table {
        border-collapse: collapse;
        width: 60%;
    }

    th,td {
        padding: 3px;
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

if (isset($_GET['id_buah'])) {
    $id_buah = $_GET['id_buah'];

    $sql = "SELECT id_buah, nama_buah, harga_buah FROM buah WHERE id_buah = ?";

    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("s", $id_buah);
    

    $stmt->execute();
    
   
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<form method="post" action="edit_data_koneksi.php">';
        echo '<table>';
        echo '<tr><td>ID Buah</td><td><input type="text" name="id_buah" value="' . $row['id_buah'] . '" readonly></td></tr>';
        echo '<tr><td>Nama Buah</td><td><input type="text" name="nama_buah" value="' . $row['nama_buah'] . '"></td></tr>';
        echo '<tr><td>Harga Buah</td><td><input type="text" name="harga_buah" value="' . $row['harga_buah'] . '"></td></tr>';
        echo '</table>';
        echo '<br>';
    } else {
        echo 'Data tidak ditemukan.';
    }
    
    $stmt->close();
} else {
    echo 'Invalid request.';
}

$conn->close();
?>

<hr width="35%" color="red" align="left" style="margin-top: -10px;">
<input type="submit" value="Submit">
</form>

