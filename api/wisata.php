<?php
    session_start();

    // KALAU MAU HARUS LOGIN BUAT AKSES BOWIS, 3 LINE DIBAWAH INI UNCOMMENT
    // if(empty($_SESSION['username'])){
    //     header('Location: login.php');
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/landing/style.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.all.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('https://3.bp.blogspot.com/-XbsKf2Hu778/UxVtx1PXe2I/AAAAAAAAKtI/WewtyZGqKaA/s1600/Alam04.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .logo {
            max-width: 100px; 
            margin: 5px 0; 
        }
        nav .navbar-nav .nav-item .nav-link {
            
            font-weight: bold;
            
        }
        h1 {
            font-size: 36px;
            text-align: center;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.9);
            /* text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); */
            background-color:#CDC9F2;
            padding: 15px 30px;
            border-radius: 15px;
            display: inline-block;
            width: auto; 
            margin: 0 auto; 
        }
        label {
            font-size: 18px;
            margin-top: 20px;
            color: rgba(255, 255, 255, 0.9);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            background-color: #9290F5;
            padding: 10px;
            border-radius: 10px;
            display: block;
        }
        .form-group {
            background-color:#CDC9F2;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            margin-top: 20px;
            background-color: #CDC9F2;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #9290F5;
            
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #CDC9F2;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .freckle-face-regular {
        font-family: "Freckle Face", system-ui;
        font-weight: 400;
        font-style: normal;
        color:#5E5DA6;
        }
        .poppins{
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-style: bold;
            color:#5E5DA6;
        }
    </style>
    <title>Destinasi Wisata</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg" style="background-color: #CDC9F2;">
            <div class="container">
                <a class="navbar-brand mr-auto" href="#"><img src="../foto/Bowis.png" alt="Logo" class="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                                <a class="nav-link poppins" href="index.php" style="color: #9290F5;">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link poppins" href="tentang.php" style="color: #9290F5;">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link poppins" href="wisata.php" style="color: #5E5DA6;">Wisata</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link poppins" href="kontak.php" style="color: #9290F5;">Kontak</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link poppins" href="galeri.php" style="color: #9290F5;">Galeri</a>
                            </li>
                        </li>    
                    </ul>
                    <ul class="navbar-nav ms-auto poppins" >
                    <?php if (!empty($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="confirmLogout()" style="color: #CB6CE2;">
                                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                                </a>
                            </li>
                            <script>
                                function confirmLogout() {
                                    Swal.fire({
                                        title: 'Apakah Anda yakin?',
                                        text: "Anda akan segera Log Out",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, Log Out!',
                                        cancelButtonText: 'Batal'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "back_logout.php";
                                        }
                                    });
                                }
                            </script>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php" style="color: #CB6CE2;">Login</a>
                                </li>
                            <?php endif; ?>
                        </li>
                    </ul>
                        
                    
                </div>
            </div>
        </nav>
    </header>

    <h1 class="mt-5 poppins">Pilih Kategori dan Kecamatan Wisata</h1>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <form action="detailwisata.php" method="GET">
                    <div class="form-group border p-3 poppins">
                        <label for="kategori">Pilih Kategori:</label>
                        <select class="form-control" id="kategori" name="kategori">
                            <option value="wisata_alam">Wisata Alam</option>
                            <option value="pusat_perbelanjaan">Pusat Perbelanjaan</option>
                            <option value="taman_hiburan">Taman Hiburan</option>
                            <option value="kuliner">Kuliner</option>
                            <option value="wisata_sejarah">Wisata Sejarah</option>
                            <option value="wisata_religi">Wisata Religi</option>
                        </select>
                        <label for="kecamatan">Pilih Kecamatan:</label>
                        <select class="form-control" id="kecamatan" name="kecamatan">
                            <option value="bogor_selatan">Bogor Selatan</option>
                            <option value="bogor_utara">Bogor Utara</option>
                            <option value="bogor_barat">Bogor Barat</option>
                            <option value="bogor_timur">Bogor Timur</option>
                            <option value="bogor_tengah">Bogor Tengah</option>
                            <option value="tanah_sereal">Tanah Sereal</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block poppins">Tampilkan</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p class="poppins">&copy; 2024 Destinasi Wisata. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>