<head>
    <script>
        function confirmDelete() {
            return confirm("Apakah kamu yakin?");
        }
    </script>
    <link rel="icon" href="logo.png">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        body{
            background-image: url(bg.avif);
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
        }
        table th{
            background-color: blue;

        }
        table td{
            background-color: black;
        }
    </style>
</head>

<div class="container">
    <h1>TABEL DATA BUAH</h1>
    <hr width="60%" color="red" align="center">

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

    // Display data from 'buah' table
    $sql_buah = "SELECT id_buah, nama_buah, harga_buah FROM buah";
    $result_buah = $conn->query($sql_buah);

    if ($result_buah->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID Buah</th><th>Nama Buah</th><th>Harga Buah</th><th></th><th></th></tr>';

        while ($row_buah = $result_buah->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row_buah['id_buah'] . '</td>';
            echo '<td>' . $row_buah['nama_buah'] . '</td>';
            echo '<td>' . $row_buah['harga_buah'] . '</td>';
            echo '<td><a href="edit_data.php?id_buah=' . $row_buah['id_buah'] . '"><button style="background-color: green;">Edit</button></a></td>';
            echo '<td><a href="hapus_data.php?id_buah=' . $row_buah['id_buah'] . '" onclick="return confirmDelete()"><button style="background-color: red;">Hapus</button></a></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Tidak ada data yang ditemukan.';
    }

    echo '<hr width="60%" color="red" align="center">';

    // Display data from 'data_pembelian' table
    $sql_pembelian = "SELECT id_pembelian, nama_pembeli, alamat_pembeli, id_buah, nama_buah, harga_buah, jumlah_pembelian FROM data_pembelian";
    $result_pembelian = $conn->query($sql_pembelian);

    if ($result_pembelian->num_rows > 0) {
        echo '<h1>TABEL DATA PEMBELIAN</h1>';
        echo '<hr width="60%" color="red" align="center">';
        echo '<table>';
        echo '<tr><th>ID Pembelian</th><th>Nama Pembeli</th><th>Alamat Pembeli</th><th>ID Buah</th><th>Nama Buah</th><th>Harga Buah</th><th>Jumlah Pembelian</th><th>Action</th></tr>';

        while ($row_pembelian = $result_pembelian->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row_pembelian['id_pembelian'] . '</td>';
            echo '<td>' . $row_pembelian['nama_pembeli'] . '</td>';
            echo '<td>' . $row_pembelian['alamat_pembeli'] . '</td>';
            echo '<td>' . $row_pembelian['id_buah'] . '</td>';
            echo '<td>' . $row_pembelian['nama_buah'] . '</td>';
            echo '<td>' . $row_pembelian['harga_buah'] . '</td>';
            echo '<td>' . $row_pembelian['jumlah_pembelian'] . '</td>';
            echo '<td><a href="edit_data_pembelian.php?id_pembelian=' . $row_pembelian['id_pembelian'] . '"><button style="background-color: green;">Edit</button></a>';
            echo '<a href="hapus_data_pembelian.php?id_pembelian=' . $row_pembelian['id_pembelian'] . '" onclick="return confirmDelete()"><button style="background-color: red;">Hapus</button></a></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Tidak ada data pembelian yang ditemukan.';
    }
    echo '<hr width="60%" color="red" align="center">';

    $sql_join = "SELECT buah.id_buah, buah.nama_buah, data_pembelian.id_pembelian, data_pembelian.nama_pembeli, buah.harga_buah, data_pembelian.jumlah_pembelian, (buah.harga_buah * data_pembelian.jumlah_pembelian) AS total FROM buah JOIN data_pembelian ON buah.id_buah = data_pembelian.id_buah";
    $result_join = $conn->query($sql_join);

    if ($result_join->num_rows > 0) {
        echo '<h1>TABEL DATA JOINED BUAH DAN DATA PEMBELIAN</h1>';
        echo '<hr width="60%" color="red" align="center">';
        echo '<table>';
        echo '<tr><th>ID Buah</th><th>Nama Buah</th><th>ID Pembelian</th><th>Nama Pembeli</th><th>Harga Buah</th><th>Jumlah Pembelian</th><th>Total</th></tr>';

        while ($row_join = $result_join->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row_join['id_buah'] . '</td>';
            echo '<td>' . $row_join['nama_buah'] . '</td>';
            echo '<td>' . $row_join['id_pembelian'] . '</td>';
            echo '<td>' . $row_join['nama_pembeli'] . '</td>';
            echo '<td>' . $row_join['harga_buah'] . '</td>';
            echo '<td>' . $row_join['jumlah_pembelian'] . '</td>';
            echo '<td>Rp. ' . $row_join['total'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Tidak ada data pembelian yang ditemukan.';
    }
    echo '<hr width="60%" color="red" align="center">';
    
    $sql_total = "SELECT buah.nama_buah, SUM(buah.harga_buah * data_pembelian.jumlah_pembelian) AS total FROM buah JOIN data_pembelian ON buah.id_buah = data_pembelian.id_buah GROUP BY buah.nama_buah";
    $result_total = $conn->query($sql_total);

    if ($result_total->num_rows > 0) {
        echo '<h1>TABEL TOTAL HARGA BUAH PER NAMA BUAH</h1>';
        echo '<hr width="60%" color="red" align="center">';
        echo '<table>';
        echo '<tr><th>Nama Buah</th><th>Total Harga Buah</th></tr>';

        while ($row_total = $result_total->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row_total['nama_buah'] . '</td>';
            echo '<td>Rp. ' . $row_total['total'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Tidak ada data total harga buah yang ditemukan.';
    }
    $sql_total_all = "SELECT SUM(buah.harga_buah * data_pembelian.jumlah_pembelian) AS total FROM buah JOIN data_pembelian ON buah.id_buah = data_pembelian.id_buah";
    $result_total_all = $conn->query($sql_total_all);

    if ($result_total_all->num_rows > 0) {
        $row_total_all = $result_total_all->fetch_assoc();
        $total_all = $row_total_all['total'];
        
        echo '<h1>TOTAL HARGA SEMUA BUAH</h1>';
        echo '<hr width="60%" color="red" align="center">';
        echo '<p>Total harga semua buah: Rp. ' . $total_all . '</p>';
    } else {
        echo 'Tidak ada data total harga buah yang ditemukan.';
    }

    $conn->close();
    ?>

    <hr width="60%" color="red" align="center">
    <p>Kembali ke menu <a href="input_barang.php">Input Data</a></p>
    <a href="search.php">Tampilan Cari</a>
</div>
