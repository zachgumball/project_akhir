<?php
include 'koneksi.php';

$sql = "SELECT id_buah, nama_buah,harga_buah, gambar FROM buah";
$result = $conn->query($sql);

$fruitNames = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_buah = $row['id_buah'];
        $nama_buah = $row['nama_buah'];
        $harga_buah = $row['harga_buah'];
        $gambar_destination = $row['gambar'];
        $fruitNames[$id_buah] = $nama_buah;
        $priceFruit[$id_buah] = $harga_buah;
        ?>
        
        <?php
    }
} else {
    echo 'No fruits found.';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Toko Buah Zynta</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="icon" href="logo.png">
        <style>
            body{
                width: 100%;
                height: 100%;
                background-color: rgba(247, 245, 245, 0.8);
                background-image: url(background.jpg);
            }
            .bg-body-tertiary{
                background-color: blanchedalmond !important;
            }
            .col{
                border-radius: 10px;
                border: 1px solid blue;
            }
            .col img{
              transform: transition 0.3s ;
            }
            .col img:hover{
              transform: scale(1.1);
            }
            .btn{
              margin-bottom: 5px;
            }
            .col p{
              padding-top: 10px;
            }
            .nav-link{
              transform: transition 0.3;
            }
            .id_buah{
              font-family: 'Tilt Prism', cursive;
            }
            .overlay, .overlay1, .overlay2, .overlay3, .overlay4, .overlay5 {
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              background-color: rgba(0, 0, 0, 0.5);
              display: none;
              justify-content: center;
              align-items: center;
              z-index: 9999;
            }
            
            .form-box {
              background-color: white;
              padding: 20px;
              border-radius: 10px;
              width: 500px;
              max-width: 90%;
              text-align: center;
            }

            .form-box button {
              width: 100%;
              padding: 10px;
              border: none;
              background-color: #4caf50;
              color: white;
              border-radius: 5px;
              cursor: pointer;
            }
            @import url('https://fonts.googleapis.com/css2?family=Kalam:wght@700&family=Righteous&family=Tilt+Prism&display=swap');
        </style>
    </head>
    <body>
        <!-- Navigasi -->
        <div class="navigasi" style="margin-left: 100px; margin-right: 100px;">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="border-radius: 10px;">
            <div class="container-fluid" style="background-color: blanchedalmond;">
              <a class="navbar-brand" href="#">
                <img src="logo.png" alt="logo" width="50" height="50">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="input_barang.php" target="_blank" style="margin-left : 10px;">Admin</a>
                  </li>
                </ul>
                <h1 style=" font-family: 'Kalam', cursive;margin-right: 250px;">TokoBuah Zynta</h1>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
        </div>
        
          <!-- Slideshow Gambar -->
          <div class="slideshow-gambar" style="margin-left: 100px; margin-right: 100px; margin-top: 5px;">
            <img src="buah-buahan.webp" class="img-fluid" alt="buah-buahan" width="1800" height="300px">
          </div>

          <!-- Isi toko atau container -->
          <div>
            <div class="container text-center" style="margin-top: 10px;">
            <!-- Baris pertama -->
                <div class="row">
                    <div class="col" style="background-color: white; margin-right: 5px; padding-top: 10px;">
                    <?php
                      $sql = "SELECT gambar FROM buah WHERE id_buah = 'A01'";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          $row = $result->fetch_assoc();
                          $gambar_destination = $row['gambar'];
                          echo '<img src="' . $gambar_destination . '" alt="Buah Image" width="300px" height="200px">';
                      } else {
                          echo 'Gambar tidak ditemukan.';
                      }
                      ?>
                      <b><p><?php echo $fruitNames[$id_buah = 'A01']; ?></p></b>
                      <p>Harga (per-buah) = Rp. <?php echo $priceFruit[$id_buah='A01']; ?></p>
                      <button type="button" class="btn btn-primary" onclick="showFormOverlay()">BELI</button>
                  </div>
                  <div class="col" style="background-color: white; margin-right: 5px; padding-top: 10px;">
                  <?php
                      $sql = "SELECT gambar FROM buah WHERE id_buah = 'A02'";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          $row = $result->fetch_assoc();
                          $gambar_destination = $row['gambar'];
                          echo '<img src="' . $gambar_destination . '" alt="Buah Image" width="300px" height="200px">';
                      } else {
                          echo 'Gambar tidak ditemukan.';
                      }
                      ?>
                    <b><p><?php echo $fruitNames[$id_buah = 'A02']; ?></p></b>
                    <p>Harga (per-buah) = Rp. <?php echo $priceFruit[$id_buah='A02']; ?></p>
                    <button type="button" class="btn btn-primary" onclick="showFormOverlay1()">BELI</button>
                  </div>
                  <div class="col" style="background-color: white; padding-top: 10px;">
                  <?php
                      $sql = "SELECT gambar FROM buah WHERE id_buah = 'A03'";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          $row = $result->fetch_assoc();
                          $gambar_destination = $row['gambar'];
                          echo '<img src="' . $gambar_destination . '" alt="Buah Image" width="300px" height="200px">';
                      } else {
                          echo 'Gambar tidak ditemukan.';
                      }
                      ?>
                    <b><p><?php echo $fruitNames[$id_buah = 'A03']; ?></p></b>
                    <p>Harga (per-buah) = Rp. <?php echo $priceFruit[$id_buah='A03']; ?></p>
                    <button type="button" class="btn btn-primary" onclick="showFormOverlay2()">BELI</button>
                  </div>
                </div>
                <!-- Baris Kedua -->
                <div class="row" style="margin-top : 10px;">
                  <div class="col" style="background-color: white; margin-right: 5px; padding-top: 10px;">
                  <?php
                      $sql = "SELECT gambar FROM buah WHERE id_buah = 'A04'";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          $row = $result->fetch_assoc();
                          $gambar_destination = $row['gambar'];
                          echo '<img src="' . $gambar_destination . '" alt="Buah Image" width="300px" height="200px">';
                      } else {
                          echo 'Gambar tidak ditemukan.';
                      }
                      ?>
                    <b><p><?php echo $fruitNames[$id_buah = 'A04']; ?></p></b>
                    <p>Harga (per-buah) = Rp. <?php echo $priceFruit[$id_buah='A04']; ?></p>
                    <button type="button" class="btn btn-primary" onclick="showFormOverlay3()">BELI</button>
                  </div>
                  <div class="col" style="background-color: white; margin-right: 5px; padding-top: 10px;">
                  <?php
                      $sql = "SELECT gambar FROM buah WHERE id_buah = 'A05'";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          $row = $result->fetch_assoc();
                          $gambar_destination = $row['gambar'];
                          echo '<img src="' . $gambar_destination . '" alt="Buah Image" width="300px" height="200px">';
                      } else {
                          echo 'Gambar tidak ditemukan.';
                      }
                      ?>
                    <b><p><?php echo $fruitNames[$id_buah = 'A05']; ?></p></b>
                    <p>Harga (per-buah) = Rp. <?php echo $priceFruit[$id_buah='A05']; ?></p>
                    <button type="button" class="btn btn-primary" onclick="showFormOverlay4()">BELI</button>
                  </div>
                  <div class="col" style="background-color: white; padding-top: 10px;">
                  <?php
                      $sql = "SELECT gambar FROM buah WHERE id_buah = 'A06'";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          $row = $result->fetch_assoc();
                          $gambar_destination = $row['gambar'];
                          echo '<img src="' . $gambar_destination . '" alt="Buah Image" width="300px" height="200px">';
                      } else {
                          echo 'Gambar tidak ditemukan.';
                      }
                      ?>
                    <b><p><?php echo $fruitNames[$id_buah = 'A06']; ?></p></b>
                    <p>Harga (per-buah) = Rp. <?php echo $priceFruit[$id_buah='A06']; ?></p>
                    <button type="button" class="btn btn-primary" onclick="showFormOverlay5()">BELI</button>
                  </div>
                </div>
              </div>
          </div>
          <div class="overlay">
            <div class="form-box">
              <h3>Masukan data pembelian</h3>
              <hr>
              <form method="post" action="proses_pembelian.php">
                <table>
                    <tr>
                        <td><p style="text-align: left;">Nama Pembeli</p></td>
                        <td>: <input type="text" name="nama_pembeli"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Alamat Pembeli</p></td>
                        <td>: <input type="text" name="alamat_pembeli"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Id Buah</p></td>
                        <td>: <input type="text" name="id_buah" value="<?php echo $id_buah='A01'; ?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Nama Barang/Buah</p></td>
                        <td>: <input type="text" name="nama_buah" value="<?php echo $fruitNames[$id_buah = 'A01']; ?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Harga Satuan</p></td>
                        <td>: <input type="text" name="harga_buah" value="<?php echo $priceFruit[$id_buah='A01'];?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Jumlah Pembelian</p></td>
                        <td>: <input type="text" name="jumlah_pembelian"></td>
                    </tr>
                </table>
                <button type="submit" style="margin-bottom: 10px;">Submit</button>
            </form>
            <button type="button" onclick="hideFormOverlay()" style="background-color: red;">Close</button>
          </div>
        </div>
        <div class="overlay1">
            <div class="form-box">
              <h3>Masukan data pembelian</h3>
              <hr>
              <form method="post" action="proses_pembelian.php">
                <table>
                    <tr>
                        <td><p style="text-align: left;">Nama Pembeli</p></td>
                        <td>: <input type="text" name="nama_pembeli"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Alamat Pembeli</p></td>
                        <td>: <input type="text" name="alamat_pembeli"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Id Buah</p></td>
                        <td>: <input type="text" name="id_buah" value="<?php echo $id_buah='A02'; ?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Nama Barang/Buah</p></td>
                        <td>: <input type="text" name="nama_buah" value="<?php echo $fruitNames[$id_buah = 'A02']; ?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Harga Satuan</p></td>
                        <td>: <input type="text" name="harga_buah" value="<?php echo $priceFruit[$id_buah='A02'];?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Jumlah Pembelian</p></td>
                        <td>: <input type="text" name="jumlah_pembelian"></td>
                    </tr>
                </table>
                <button type="submit" style="margin-bottom: 10px;">Submit</button>
            </form>
            <button type="button" onclick="hideFormOverlay()" style="background-color: red;">Close</button>
          </div>
        </div>
        <div class="overlay2">
            <div class="form-box">
              <h3>Masukan data pembelian</h3>
              <hr>
              <form method="post" action="proses_pembelian.php">
                <table>
                    <tr>
                        <td><p style="text-align: left;">Nama Pembeli</p></td>
                        <td>: <input type="text" name="nama_pembeli"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Alamat Pembeli</p></td>
                        <td>: <input type="text" name="alamat_pembeli"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Id Buah</p></td>
                        <td>: <input type="text" name="id_buah" value="<?php echo $id_buah='A03'; ?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Nama Barang/Buah</p></td>
                        <td>: <input type="text" name="nama_buah" value="<?php echo $fruitNames[$id_buah = 'A03']; ?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Harga Satuan</p></td>
                        <td>: <input type="text" name="harga_buah" value="<?php echo $priceFruit[$id_buah='A03'];?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Jumlah Pembelian</p></td>
                        <td>: <input type="text" name="jumlah_pembelian"></td>
                    </tr>
                </table>
                <button type="submit" style="margin-bottom: 10px;">Submit</button>
            </form>
            <button type="button" onclick="hideFormOverlay()" style="background-color: red;">Close</button>
          </div>
        </div>
        <div class="overlay3">
            <div class="form-box">
              <h3>Masukan data pembelian</h3>
              <hr>
              <form method="post" action="proses_pembelian.php">
                <table>
                    <tr>
                        <td><p style="text-align: left;">Nama Pembeli</p></td>
                        <td>: <input type="text" name="nama_pembeli"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Alamat Pembeli</p></td>
                        <td>: <input type="text" name="alamat_pembeli"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Id Buah</p></td>
                        <td>: <input type="text" name="id_buah" value="<?php echo $id_buah='A04'; ?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Nama Barang/Buah</p></td>
                        <td>: <input type="text" name="nama_buah" value="<?php echo $fruitNames[$id_buah = 'A04']; ?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Harga Satuan</p></td>
                        <td>: <input type="text" name="harga_buah" value="<?php echo $priceFruit[$id_buah='A04'];?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Jumlah Pembelian</p></td>
                        <td>: <input type="text" name="jumlah_pembelian"></td>
                    </tr>
                </table>
                <button type="submit" style="margin-bottom: 10px;">Submit</button>
            </form>
            <button type="button" onclick="hideFormOverlay()" style="background-color: red;">Close</button>
          </div>
        </div>
        <div class="overlay4">
            <div class="form-box">
              <h3>Masukan data pembelian</h3>
              <hr>
              <form method="post" action="proses_pembelian.php">
                <table>
                    <tr>
                        <td><p style="text-align: left;">Nama Pembeli</p></td>
                        <td>: <input type="text" name="nama_pembeli"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Alamat Pembeli</p></td>
                        <td>: <input type="text" name="alamat_pembeli"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Id Buah</p></td>
                        <td>: <input type="text" name="id_buah" value="<?php echo $id_buah='A05'; ?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Nama Barang/Buah</p></td>
                        <td>: <input type="text" name="nama_buah" value="<?php echo $fruitNames[$id_buah = 'A05']; ?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Harga Satuan</p></td>
                        <td>: <input type="text" name="harga_buah" value="<?php echo $priceFruit[$id_buah='A05'];?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Jumlah Pembelian</p></td>
                        <td>: <input type="text" name="jumlah_pembelian"></td>
                    </tr>
                </table>
                <button type="submit" style="margin-bottom: 10px;">Submit</button>
            </form>
            <button type="button" onclick="hideFormOverlay()" style="background-color: red;">Close</button>
          </div>
        </div>
        <div class="overlay5">
            <div class="form-box">
              <h3>Masukan data pembelian</h3>
              <hr>
              <form method="post" action="proses_pembelian.php">
                <table>
                    <tr>
                        <td><p style="text-align: left;">Nama Pembeli</p></td>
                        <td>: <input type="text" name="nama_pembeli"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Alamat Pembeli</p></td>
                        <td>: <input type="text" name="alamat_pembeli"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Id Buah</p></td>
                        <td>: <input type="text" name="id_buah" value="<?php echo $id_buah='A06'; ?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Nama Barang/Buah</p></td>
                        <td>: <input type="text" name="nama_buah" value="<?php echo $fruitNames[$id_buah = 'A06']; ?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Harga Satuan</p></td>
                        <td>: <input type="text" name="harga_buah" value="<?php echo $priceFruit[$id_buah='A06'];?>"></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: left;">Jumlah Pembelian</p></td>
                        <td>: <input type="text" name="jumlah_pembelian"></td>
                    </tr>
                </table>
                <button type="submit" style="margin-bottom: 10px;">Submit</button>
            </form>
            <button type="button" onclick="hideFormOverlay()" style="background-color: red;">Close</button>
          </div>
        </div>
          
          <!-- Prompt untuk admin -->
          <script>
            window.onload = function() {
                var mode_admin = confirm("Apakah kamu admin?");

                if (mode_admin) {
                    var admin_terverifikasi = false;

                    while (!admin_terverifikasi) {
                        var username = prompt("Masukkan username:");
                        var password = prompt("Masukkan password:");

                        if (username === "zynext" && password === "zeta2514") {
                            admin_terverifikasi = true;
                        } else {
                            var retry = confirm("Data yang kamu masukkan salah, apakah kamu ingin mengulang?");
                            if (!retry) {
                                break;
                            }
                        }
                    }

                    if (admin_terverifikasi) {
                        var navigasi_admin = document.querySelector('.nav-link.disabled');
                        navigasi_admin.classList.remove('disabled');
                    }
                }
            };
        </script>
        <script>
          function showFormOverlay() {
            document.querySelector('.overlay').style.display = 'flex';
          }
          function hideFormOverlay() {
            document.querySelector('.overlay').style.display = 'none';
          }
          function showFormOverlay1() {
            document.querySelector('.overlay1').style.display = 'flex';
          }
          function hideFormOverlay1() {
            document.querySelector('.overlay1').style.display = 'none';
          }
          function showFormOverlay2() {
            document.querySelector('.overlay2').style.display = 'flex';
          }
          function hideFormOverlay2() {
            document.querySelector('.overlay2').style.display = 'none';
          }
          function showFormOverlay3() {
            document.querySelector('.overlay3').style.display = 'flex';
          }
          function hideFormOverlay3() {
            document.querySelector('.overlay3').style.display = 'none';
          }
          function showFormOverlay4() {
            document.querySelector('.overlay4').style.display = 'flex';
          }
          function hideFormOverlay4() {
            document.querySelector('.overlay4').style.display = 'none';
          }
          function showFormOverlay5() {
            document.querySelector('.overlay5').style.display = 'flex';
          }
          function hideFormOverlay5() {
            document.querySelector('.overlay5').style.display = 'none';
          }
      </script>
    </body>
</html>
<?php
$conn->close();
?>