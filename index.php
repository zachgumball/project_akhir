<?php
include 'koneksi.php'
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
            }
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
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
        </div>
        
          <!-- Slideshow Gambar -->
          <div class="slideshow-gambar" style="margin-left: 100px; margin-right: 100px;">
            <img src="buah-buahan.webp" class="img-fluid" alt="buah-buahan" width="1800" height="300">
          </div>

          <!-- Isi toko atau container -->
          <div>
            <div class="container text-center" style="margin-top: 10px;">
            <!-- Baris pertama -->
                <div class="row">
                  <div class="col" style="background-color: white; margin-right: 5px; padding-top: 5px;">
                    <img src="jeruk.jpg" alt="jeruk" width="300px" height="200px">
                    <b><p>Jeruk Segar</p></b>
                    <p>Harga (per-buah) = Rp. <?php echo $harga_jeruk?></p>
                  </div>
                  <div class="col" style="background-color: white; margin-right: 5px; padding-top: 5px;">
                    <img src="anggur.webp" alt="anggur" width="300px" height="200px">
                    <b><p>Anggur Segar</p></b>
                    <p>Harga (per-buah) = Rp. <?php echo $harga_anggur?></p>
                  </div>
                  <div class="col" style="background-color: white; padding-top: 5px;">
                    <img src="apel.jpg" alt="apel" width="300px" height="200px">
                    <b><p>Apel Segar</p></b>
                    <p>Harga (per-buah) = Rp. <?php echo $harga_apel?></p>
                  </div>
                </div>
                <!-- Baris Kedua -->
                <div class="row" style="margin-top : 10px;">
                  <div class="col" style="background-color: white; margin-right: 5px; padding-top: 5px;">
                    <img src="nanas.webp" alt="nanas" width="300px" height="200px">
                    <b><p>Nanas Segar</p></b>
                    <p>Harga (per-buah) = Rp. <?php echo $harga_nanas?></p>
                  </div>
                  <div class="col" style="background-color: white; margin-right: 5px; padding-top: 5px;">
                    <img src="alpukat.jpg" alt="alpukat" width="300px" height="200px">
                    <b><p>Alpukat</p></b>
                    <p>Harga (per-buah) = Rp. <?php echo $harga_alpukat?></p>
                  </div>
                  <div class="col" style="background-color: white; padding-top: 5px;">
                    <img src="pepaya.jpg" alt="pepaya" width="300px" height="200px">
                    <b><p>Pepaya</p></b>
                    <p>Harga (per-buah) = Rp. <?php echo $harga_pepaya?></p>
                  </div>
                </div>
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
    </body>
</html>
<?php
$conn->close();
?>
