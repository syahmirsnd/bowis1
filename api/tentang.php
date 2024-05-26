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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/landing/style.css">
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.all.min.js"></script>
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
                                <a class="nav-link poppins" href="tentang.php" style="color: #5E5DA6;">Tentang</a>
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
    </header>

    <main>
        <div class="container">
            <section class="persection">
                <h1 class="display-4 poppins" style="font-weight:normal">Tentang Kami</h1>
                <p class="lead poppins" style="font-weight:normal">Ini adalah bagian tentang kami dari website Wisata Bogor. Di sini kami menyajikan informasi tentang sejarah kami, visi dan misi, serta tujuan dari pembangunan situs web ini.</p>
            </section>
            <hr class="my-4"> <!-- Garis horizontal dengan margin atas dan bawah 4 -->
            <section class="persection">
                <h2 class="display-5 poppins" style="font-weight:normal">Contact Us</h2>
                <p class="poppins" style="font-weight:normal">Jika Anda memiliki pertanyaan lebih lanjut, silakan hubungi anggota kelompok 4 kami:</p>
                <ul class="list-group">
                    <li class="list-group-item poppins" style="font-weight:normal">Farhan Aryaputra Hendriawan - (J0404221131)</li>
                    <li class="list-group-item poppins" style="font-weight:normal">Fajar Argya Wikusnara - (J0404221119)</li>
                    <li class="list-group-item poppins" style="font-weight:normal">Puteri Vanya Salsabila - (J0404221097)</li>
                    <li class="list-group-item poppins" style="font-weight:normal">Fawaz Alfatama Putra - (J0404221027)</li>
                    <li class="list-group-item poppins" style="font-weight:normal">Fatahillah Saiful Islam - (J0404221146)</li>
                    <li class="list-group-item poppins" style="font-weight:normal">Muhammad Restu Alvian Firmansyah - (J0404221143)</li>
                </ul>
            </section>
            <hr class="my-4"> <!-- Garis horizontal dengan margin atas dan bawah 4 -->
            <section class="persection">
                <h2 class="display-5 poppins">Our Mission</h2>
                <p class="poppins" style="font-weight:normal">Misi kami adalah memberikan pengalaman wisata terbaik kepada pengunjung kami, mempromosikan kekayaan alam dan budaya Bogor, dan menjadi sumber informasi yang berguna bagi wisatawan yang berkunjung ke kota ini.</p>
            </section>

            <!-- Form untuk saran dan kritik -->
            <section class="persection">
                <h2 class="display-5 poppins">Saran dan Kritik</h2>
                <form id="saranForm" action="back_feedback.php">
                    <div class="mb-3">
                        <label for="saran" class="form-label poppins" style="font-weight:normal">Saran atau Kritik:</label>
                        <textarea class="form-control" id="saran" name="saran" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn" style="background-color:#9290F5; color:white " form="saranForm">Submit</button>
                </form>
            </section>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <p class="poppins">&copy; 2023 Wisata Bogor. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JavaScript (diperlukan untuk dropdown navbar, toggle button, dll.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <script>
        function kirimSaran() {
            var saran = document.getElementById("saran").value;
            // Kirim saran menggunakan AJAX atau jalankan fungsi lainnya
            // Setelah itu, kosongkan textarea
            document.getElementById("saran").value = "";
            // Berikan umpan balik atau lakukan tindakan lainnya
            alert("Saran Anda telah terkirim. Terima kasih atas masukannya!");
        }
    </script> -->
</body>
</html>
