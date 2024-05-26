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
<title>Daftar Kontak Tempat Wisata Bogor</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/landing/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="../assets/js/pdf.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.4/dist/sweetalert2.all.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<style>
        .logo {
            max-width: 100px; 
            margin: 5px 0; 
        }
        nav .navbar-nav .nav-item .nav-link {
            
            font-weight: bold;
            
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
                        <li class="nav-item">
                                <a class="nav-link poppins" href="index.php" style="color: #9290F5;">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link poppins" href="tentang.php" style="color: #9290F5;">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link poppins" href="wisata.php" style="color: #9290F5;">Wisata</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link poppins" href="kontak.php" style="color: #5E5DA6">Kontak</a>
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
    <link rel="stylesheet" href="../assets/css/landing/stylekontak.css">
    <div class="Daftar wisata">
        <h1 class="poppins">Daftar Kontak Tempat Wisata Bogor</h1>
        <div class="contact-item">
            <h2>Bogor Selatan</h2>
            <p>Tirtania WaterPark: <a href="https://wa.me/628569583102156"> 0856-9583-102156</a></p>
            <p>The Jungle Water Adventure: (0251) 8212 6667891011</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Utara</h2>
            <p>Istana Bogor: (0251) 8321001, 83281721213</p>
            <p>Taman Safari Indonesia: (0251) 82500001415</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Timur</h2>
            <p>Kuntum Farmfield: 02518244725 / 087720781000161718</p>
            <p>Taman Wisata Matahari: 02518252-337 / <a href="https://wa.me/62811890957119">+62 811890957119</a></p>
        </div>
        <div class="contact-item">
            <h2>Bogor Barat</h2>
            <p>Ekowisata Situ Gede: <a href="https://wa.me/+62812-9000-296920">0812-9000-296920</a></p>
        </div>
        <div class="contact-item">
            <h2>Bogor Tengah</h2>
            <p>Kebun Raya Bogor: (0251) 83113621234</p>
            <p>Taman Kencana: (021)5552868 / <a href="https://wa.me/6282110080071">0821-1008-0071</a></p>
            <p>Sempur Park: Tidak ada nomor telepon tersedia</p>
            <p>Bogor Botanical Gardens: (0251) 8311362</p>
        </div>
        <div class="contact-item">
            <h2>Tanah Sareal</h2>
            <p>Marcopolo Water Adventure: <a href="https://wa.me/6285782468160">+62 857-8246-8160</a></p>
            <p>Taman Bunga Nusantara: (0263) 581617</p>
        </div>
        <div style="display:flex;justify-content:center;align-items:center;text-align:center"><button class="btn-success" style="border-radius:10px;" onclick="generatePDFTempatWisata()">Cetak PDF</button>
        </div>
    </div>
    <div class="Daftar belanja">
        <h1 class="poppins">Daftar Kontak Pusat Perbelanjaan Bogor</h1>
        <div class="contact-item">
            <h2>Bogor Selatan</h2>
            <p>Tajur Trade Mall:<a href="https://wa.me/628157434703612"> +62 815-7434-703612</a></p>
            <p>Pasar Ledeng: 0856-7272-676</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Utara</h2>
            <p>Pasar Tanah Baru:<a href="https://wa.me/+62857-7258-7915"> +62 857-7258-7915</a></p>
        </div>
        <div class="contact-item">
            <h2>Bogor Timur</h2>
            <p>Lippo Plaza Ekalokasari Bogor: +62 251 831878878</p>
            <p>BOXIES 123 MALL BOGOR: +62 251 8578123910</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Barat</h2>
            <p>BTW Mall:<a href="https://wa.me/ +62813-1148-921211"> +62 813-1148-921211</a></p>
            <p>Pasar Gunung Batu:<a href="https://wa.me/6283139424086"> 0831-3942-4086</a></p>
        </div>
        <div class="contact-item">
            <h2>Bogor Tengah</h2>
            <p>Lippo Plaza Keboen Raya: +62 251 8401 00012</p>
            <p>Mall BTM Bogor: +62 251 84010001314</p>
        </div>
        <div class="contact-item">
            <h2>Tanah Sareal</h2>
            <p>MODERN MARKET KEMENANGAN:<a href="https://wa.me/6281290217672"> 0812-9021-7672</a></p>
            <p>Transmart Yasmin Bogor: <a href="https://wa.me/6281295517346">081295517346</a></p>
        </div>
        <div style="display:flex;justify-content:center;align-items:center;text-align:center"><button class="btn-success" style="border-radius:10px;" onclick="generatePDFPusatBelanja()">Cetak PDF</button>
        </div>
    </div>
    <div class="Daftar taman">
        <h1 class="poppins">Daftar Kontak Taman Hiburan di Kabupaten Bogor</h1>
        <div class="contact-item">
            <h2>Bogor Selatan</h2>
            <p>Taman Cipaku: Informasi kontak spesifik tidak tersedia.</p>
            <p>Taman Batutulis: Informasi kontak spesifik tidak tersedia.</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Utara</h2>
            <p>Taman Bangbarung: Informasi kontak spesifik tidak tersedia.</p>
            <p>Taman Gandaria: (021) 726-2857</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Timur</h2>
            <p>Taman Mars Griya Bogor Raya: Informasi kontak spesifik tidak tersedia.</p>
            <p>Taman Angklung:<a href="https://wa.me/62857930475121"> 0857-9304-75121</a></p>
        </div>
        <div class="contact-item">
            <h2>Bogor Barat</h2>
            <p>Taman Bubulak: Informasi kontak spesifik tidak tersedia.</p>
            <p>Manunggal Park: Informasi kontak spesifik tidak tersedia.</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Tengah</h2>
            <p>Taman Kencana: Informasi kontak spesifik tidak tersedia.</p>
            <p>Taman Sempur: 0251-7544005; <a href="https://wa.me/628568336115"> 0856-8336-115</a></p>
        </div>
        <div class="contact-item">
            <h2>Tanah Sereal</h2>
            <p>Taman Tanah Sareal: <a href="https://wa.me/6281990160960"> 0819-9016-0960</a></p>
            <p>Taman Heulang: 0251-7544005;<a href="https://wa.me/628568336115"> 0856-8336-115</a></p>
        </div>
        <div style="display:flex;justify-content:center;align-items:center;text-align:center"><button class="btn-success" style="border-radius:10px;" onclick="generatePDFTamanHiburan()">Cetak PDF</button>
        </div>
    </div>
    <div class="Daftar kuliner">
        <h1 class="poppins">Daftar Tempat Kuliner di Kabupaten Bogor</h1>
        <div class="contact-item">
            <h2>Bogor Selatan</h2>
            <p>Waroeng Ngariung: 0251 8321225, 0251 834743712</p>
            <p>Sate Maranggi: <a href="https://wa.me/6281212147444">0812-1214-7444</a></p>
        </div>
        <div class="contact-item">
            <h2>Bogor Utara</h2>
            <p>Gurih 7 Bogor Indonesia: 0251 83178894</p>
            <p>RM. Bumi Aki Bogor:<a href="https://wa.me/628111558518"> 0811-1558-518</a></p>
        </div>
        <div class="contact-item">
            <h2>Bogor Timur</h2>
            <p>Soto Bogor Pak Salam: <a href="https://wa.me/6281311166452">081311166452</a></p>
            <p>De Leuit Jambal Rice Sensation:<a href="https://wa.me/6281192258088"> 0811-9225-8088</a></p>
        </div>
        <div class="contact-item">
            <h2>Bogor Barat</h2>
            <p>Rumah Makan Bunut Semeru: (0251) 8333512</p>
            <p>Soto Kuning PAK YUSUP: 0251 77699089</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Tengah</h2>
            <p>Saung Pak Ewok:<a href="https://wa.me/628119225808"> 0811-9225-808</a></p>
            <p>Cungkring Pak Jumat: 0251 776990811</p>
        </div>
        <div class="contact-item">
            <h2>Tanah Sereal</h2>
            <p>Bebek Pak Ndut Bogor Air Mancur: (0251) 8327801</p>
            <p>Saung Kuring Sundanese: (0251) 8331885</p>
        </div>
        <div style="display:flex;justify-content:center;align-items:center;text-align:center"><button class="btn-success" style="border-radius:10px;" onclick="generatePDFTempatKuliner()">Cetak PDF</button>
        </div>
    </div>
    <div class="Daftar museum">
        <h1 class="poppins">Daftar Museum di Kabupaten Bogor</h1>
        <div class="contact-item">
            <h2>Bogor Selatan</h2>
            <p>Prasasti Batu Tulis: (0251) 9277806</p>
            <p>Situs Arca Puragalih: Informasi kontak spesifik tidak tersedia.</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Timur</h2>
            <p>Kujang Monument: 0251-8345467</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Tengah</h2>
            <p>Museum of Zoology (Museum Zoologicum Bogoriense): (0251) 8311362 - 8336871</p>
            <p>Museum PETA: (0251) 8332768</p>
        </div>
        <div style="display:flex;justify-content:center;align-items:center;text-align:center"><button class="btn-success" style="border-radius:10px;" onclick="generatePDFMuseum()">Cetak PDF</button>
        </div>
    </div>
    <div class="Daftar religi">
        <h1 class="poppins">Daftar Tempat Wisata Religi di Kabupaten Bogor</h1>
        <div class="contact-item">
            <h2>Bogor Selatan</h2>
            <p>Masjid An-Nur: (0251) 836429</p>
            <p>Makam Keramat Empang Bogor: 02177884213</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Utara</h2>
            <p>Masjid Al Mustofa:<a href="https://wa.me/6285832103100">0858-3210-3100</a></p>
            <p>Makam Keramat Kuno Bogor: Informasi kontak spesifik tidak tersedia.</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Timur</h2>
            <p>Masjid Raya Bogor: (0251) 8323344</p>
        </div>
        <div class="contact-item">
            <h2>Bogor Tengah</h2>
            <p>Masjid Agung Bogor: (0251) 8320461</p>
            <p>Vihara Dharma Surya: Informasi kontak spesifik tidak tersedia.</p>
            <p>Gereja Katedral: (0251) 8321188</p>
        </div>
        <div style="display:flex;justify-content:center;align-items:center;text-align:center;"><button class="btn-success" style="border-radius:10px;" onclick="generatePDFWisataReligi()">Cetak PDF</button>
        </div>
    </div>
    
    <footer>
        <div class="container">
            <p class="poppins">&copy; 2023 Wisata Bogor. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

</body>
</html>
