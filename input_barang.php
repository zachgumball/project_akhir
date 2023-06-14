<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pert 14</title>
        <style>
            body{
                background-color: whitesmoke;
            }
        </style>
    </head>
    <body>
        <form action="koneksi_simpan.php" method="post">
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
            </table>
            <button align="center">SUBMIT</button>
            <hr width="60%" color="red" align="left">
            <a href="tampilkan.php">Tampilkan</a>
        </form>
    </body>
</html>

<?php
$conn->close();
?>