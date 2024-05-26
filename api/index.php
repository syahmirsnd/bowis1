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
    <title>Bowis</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/landing/style.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .logo {
            max-width: 100px; 
            margin: 5px 0; 
        }
        nav .navbar-nav .nav-item .nav-link {
            
            font-weight: bold;
            
        }
        #carousel {
            max-height: 500px;
            overflow: hidden;
        }

        .carousel-inner img {
            height: auto;
            max-height: 500px; 
            width: 100%;
            object-fit: cover;
        }
        footer{
            margin-top:20px;
        }
        .poppins{
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-style: bold;
            color:#5E5DA6;
        }
    </style>
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
                        <li class="nav-item" style="margin-left:32%">
                                <a class="nav-link poppins" href="index.php" style="color: #5E5DA6;">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link poppins" href="tentang.php" style="color: #9290F5;">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link poppins" href="wisata.php" style="color: #9290F5;">Wisata</a>
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

    <main>
        <!-- Slider -->
        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3000">
            <img src="../foto/car1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <img src="../foto/car2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <img src="../foto/car3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
        <br>
        
    <section class="fitur">
            <section class="section">
                <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 ms-auto order-2 desc">
                    <h2 class="mb-4 poppins">Selamat datang di Website Wisata Bogor</h2>
                    <p class="mb-4 poppins" style="font-weight:normal">Ayo mulai menjelajahi keindahan alam dan kekayaan budaya Kota Bogor bersama kami!</p>
                    <p><a href="tentang.php" class="btn btn-fitu poppins" style="background-color: #9290F5;color:white">Tentang Kami</a></p>
                    </div>
                    <div class="col-md-6 desc" data-aos="fade-right">
                        <img src="../foto/apaitu.svg" alt="Image-what" class="img-fluid">
                    </div>
                </div>
                </div>
            </section>
            <section class="section-tanaman">
                <div class="container">
                <div class="row align-items-center ">
                    <div class="col-md-4 me-auto items1">
                        <h2 class="mb-4 text-left poppins">Belum punya tujuan?</h2>
                        <p class="mb-4 poppins" style="font-weight:normal">Gunakan fitur Wisata untuk mencari destinasi eksplorasimu!</p>
                        <p><a href="wisata.php" class="btn btn-fitur poppins"  style="background-color: #9290F5 ;color:white">Cari Wisata</a></p>
                    </div>
                    <div class="col-md-6 align-items-right items2" data-aos="fade-left">
                    <img src="../foto/fitur.svg" alt="Image-feature" class="img-fluid">
                    </div>
                </div>
                </div>
            </section>
    </section>
    <h1 style="display: flex; justify-content: center;" class="poppins">Tahukah kamu bahwa Bogor sangat terkenal dengan wisatanya?</h1>
        <div class="container">
        <canvas id="wisataChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('wisataChart').getContext('2d');
        const wisataChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Bogor Selatan', 'Bogor Utara', 'Bogor Timur', 'Bogor Tengah', 'Tanah Sareal'],
                datasets: [{
                    label: 'Jumlah Wisata',
                    data: [12, 9, 9, 15, 8],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <style>
        .container {
            width: 80%;
            margin: auto;
        }
        h1 {
            margin-top: 20px;
            text-align: center;
        }
    </style>
        <!-- Slider End -->
        <!-- <div class="container">
            <h1>Selamat Datang di Website Wisata Bogor</h1>
            <p>Nikmati sambutan hangat dan kilasan singkat tentang kekayaan alam serta destinasi menarik yang dapat Anda temui di Kota Bogor. Temukan informasi terkini tentang acara-acara lokal dan ajang wisata yang tak boleh dilewatkan.</p>
            <p>Ayo mulai menjelajahi keindahan alam dan kekayaan budaya Kota Bogor bersama kami! Sampaikan kepada kami pengalaman perjalanan Anda dan jadilah bagian dari komunitas yang mengagumi pesona wisata Bogor.</p>
            <a class="btn btn-primary" href="wisata.html">Lanjut Isi Lokasi</a>
        </div> -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    </main>

    <footer>
        <div class="container">
            <p class="poppins">&copy; 2023 Wisata Bogor. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>