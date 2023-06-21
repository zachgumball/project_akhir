<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>INPUT DATA BUAH - TBZ</title>
        <style>
            body{
                background-color: whitesmoke;
            }
        </style>
    </head>
    <body>
    <form action="koneksi_simpan.php" method="post" enctype="multipart/form-data">
            <h1>FORM INPUT DATA BUAH</h1><br>
            <hr width="60%" color="red" align="left">
            <table>
                <tr>
                <td><p>ID Buah </p></td>
                <td>: <input type="text" name="id_buah"></td></tr>
                <tr>
                <td><p>Nama Barang  </p></td>
                <td>: <input type="text" name="nama_buah"></td></tr>
                <tr>
                <td><p>Harga Satuan Buah  </p></td>
                <td>: <input type="text" name="harga_buah"></td></tr>
                <td><p>Gambar Buah </p></td>
                <td>: <input type="file" name="gambar"></td>
            </table>
            <button align="center">SUBMIT</button>
            <hr width="60%" color="red" align="left">
            <a href="show_table.php">Tampilkan</a>
        </form>
    </body>
</html>

<?php
$conn->close();
?>