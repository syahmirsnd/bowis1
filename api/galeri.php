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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/landing/style.css">
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
                    <ul class="navbar-nav" style="margin-left:32%">
                        <li class="nav-item">
                                <a class="nav-link poppins" href="index.php" style="color:#9290F5 ;">Beranda</a>
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
                                <a class="nav-link poppins" href="galeri.php" style="color: #5E5DA6;">Galeri</a>
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
    <style>    
        body {
            margin-bottom: 20px;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Increased gap for better spacing */
            justify-content: center; /* Center align the images */
        }
        .gallery img {
            width: 300px; /* Set a fixed maximum width for consistency */
            height: 225px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
            cursor: pointer;
        }
        .gallery img:hover {
            transform: scale(1.1);
        }
        .image-container {
            position: relative;
        }
        
        .image-container img {
            display: block;
        }
        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 10px;
            opacity: 0;
            transition: opacity 0.25s ease;
            z-index:5;
        }

        .image-container:hover .overlay {
            opacity: 1;
        }
        .image-container a {
            display: block;
            text-decoration: none;
        }
    </style>
<body>
    <h1 style="text-align:center;" class="poppins">GALERI FOTO</h1>
    
    <div class="gallery poppins">
    <div class="image-container">
            <a href="https://boxies123.co.id/">
                <img src="../foto/boxies123.jpg" alt="Boxies 123">
                <div class="overlay">Boxies 123</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://pergiyuk.com/informasi/btw-mall/">
                <img src="../foto/btwmall.jpg" alt="BTW Mall">
                <div class="overlay">BTW Mall</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.setneg.go.id/baca/index/istana_bogor">
                <img src="../foto/istanabogor.jpg" alt="Istana Bogor">
                <div class="overlay">Istana Bogor</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.thejungleadventure.com/">
                <img src="../foto/jungle.jpg" alt="The Jungle">
                <div class="overlay">The Jungle</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.instagram.com/kemenanganjaya_bogor/">
                <img src="../foto/kemenangan.jpg" alt="Kemenangan Jaya">
                <div class="overlay">Kemenangan Jaya</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.lippomalls.com/our-mall/lippo-plaza-ekalokasari-bogor/detail">
                <img src="../foto/lippoplaza.jpg" alt="LIPPO Plaza">
                <div class="overlay">LIPPO Plaza Ekalokasari</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://pergikuliner.com/catalogs/lippo-plaza-keboen-raya-bogor">
                <img src="../foto/lippoplazakeboenraya.jpg" alt="LIPPO Plaza Keboen Raya">
                <div class="overlay">LIPPO Plaza Keboen Raya</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.tripadvisor.co.id/ShowUserReviews-g297706-d12869777-r670311671-Mall_BTM_Bogor-Bogor_West_Java_Java.html">
                <img src="../foto/mallbtm.jpg" alt="BTM Mall">
                <div class="overlay">BTM Mall</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://hk.trip.com/travel-guide/attraction/bogor-city/manunggal-park-138346816?locale=en_hk">
                <img src="../foto/manunggalpark.jpg" alt="Manunggal Park">
                <div class="overlay">Manunggal Park</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.pasarpakuanjaya.co.id/pasar/info/32994949209922939247">
                <img src="../foto/pasargunungbatu.jpg" alt="Pasar Gunung Batu">
                <div class="overlay">Pasar Gunung Batu</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://pergikuliner.com/restaurants/bogor/bebek-dan-ayam-goreng-pak-ndut-bogor-timur">
                <img src="../foto/bebekpakndut.jpg" alt="Bebek Pak Ndut">
                <div class="overlay">Bebek Pak Ndut</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://deleuit.co.id/">
                <img src="../foto/deleuitbogor.jpg" alt="Deleuit Bogor">
                <div class="overlay">Deleuit Bogor</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.bmvkatedralbogor.org/">
                <img src="../foto/gereja_katedral.jpeg" alt="Gereja Katedral">
                <div class="overlay">Gereja Katedral</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://restogurih7.com/">
                <img src="../foto/gurih7bogor.jpg" alt="Gurih 7 Bogor">
                <div class="overlay">Gurih 7 Bogor</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/gsKHXcPq5S9UGLtN8">
                <img src="../foto/makamkeramat.jpg" alt="Makam Habib Empang">
                <div class="overlay">Makam Habib Empang</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://borobudurnews.com/lewat-mimpi-seorang-warga-blora-temukan-makam-kuno-bertuliskan-1461/">
                <img src="../foto/makamkeramatkuno.jpg" alt="Makam Kuno">
                <div class="overlay">Makam Kuno</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/gsKHXcPq5S9UGLtN8">
                <img src="../foto/masjid_agungbogor.jpg" alt="Masjid Agung Bogor">
                <div class="overlay">Masjid Agung Bogor</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.google.com/maps/place/Masjid+Al-Mustofa/data=!4m7!3m6!1s0x2e69c519e3014ed5:0x8d380206d9dc5b!8m2!3d-6.5781318!4d106.8031161!16s%2Fg%2F11h3x46th8!19sChIJ1U4B4xnFaS4RW9zZBgI4jQA?authuser=0&hl=id&rclk=1">
                <img src="../foto/masjid_al-mustofa.jpeg" alt="Masjid Al-Mustofa">
                <div class="overlay">Masjid Al-Mustofa</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/7K9FtdW7De1CakQW8">
                <img src="../foto/masjid_an-nur.jpg" alt="Masjid An-Nur">
                <div class="overlay">Masjid An-Nur</div>
            </a>
        </div>
        <div class="image-container">
            <a href="http://mesjidrayakotabogor.or.id/">
                <img src="../foto/masjid_rayabogor.jpg" alt="Masjid Raya Bogor">
                <div class="overlay">Masjid Raya Bogor</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/WGoXikZwefF8Pgen9">
                <img src="../foto/monumenkujang.jpg" alt="Monumen Kujang">
                <div class="overlay">Monumen Kujang</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://disjarah-tniad.mil.id/page/detail/museum-dan-monumen-peta">
                <img src="../foto/museumpeta.jpg" alt="Museum Peta">
                <div class="overlay">Museum PETA</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://kebunraya.id/bogor/interesting-spot/zoologi">
                <img src="../foto/museumzoologi.jpg" alt="Museum Zoologi">
                <div class="overlay">Museum Zoologi</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.pasarpakuanjaya.co.id/pasar/info/32994949209922939247">
                <img src="../foto/pasargunungbatu.jpg" alt="Pasar Gunung Batu">
                <div class="overlay">Pasar Gunung Batu</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.pasarpakuanjaya.co.id/pasar/info/00657970751379677867">
                <img src="../foto/pasarjambu.jpg" alt="Pasar Jambu">
                <div class="overlay">Pasar Jambu</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://id.foursquare.com/v/pasar-pintu-ledeng/5036cd26e4b0d3a793052d18">
                <img src="../foto/pasarledeng.jpg" alt="Pasar Ledeng">
                <div class="overlay">Pasar Ledeng</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.pasarpakuanjaya.co.id/pasar/info/29532172252499791304">
                <img src="../foto/pasartanahbaru.jpg" alt="Pasar Tanah Baru">
                <div class="overlay">Pasar Tanah Baru</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://id.wikipedia.org/wiki/Prasasti_Batutulis">
                <img src="../foto/prasastibatutulis.jpg" alt="Prasasti Batu Tulis">
                <div class="overlay">Prasasti Batu Tulis</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.bumiaki.com/">
                <img src="../foto/rmbumiaki.jpg" alt="Rumah Makan Bumi Aki">
                <div class="overlay">Rumah Makan Bumi Aki</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/R6iT6CgEcvGVsax18">
                <img src="../foto/rumahmakanbunut.jpg" alt="Rumah Makan Bunut">
                <div class="overlay">Rumah Makan Bunut</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://pergikuliner.com/restaurants/sate-maranggi-sn4444-bogor-selatan/menus">
                <img src="../foto/satemaranggi.jpg" alt="Sate Maranggi SN4444">
                <div class="overlay">Sate Maranggi SN4444</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://pergikuliner.com/restaurants/bogor/saung-kuring-tanah-sareal">
                <img src="../foto/saungkuring.jpg" alt="Saung Kuring">
                <div class="overlay">Saung Kuring</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.tripadvisor.co.id/Restaurant_Review-g297706-d8786761-Reviews-Saung_Pak_Ewok-Bogor_West_Java_Java.html">
                <img src="../foto/saungpakewok.jpg" alt="Saung Pak Ewok">
                <div class="overlay">Saung Pak Ewok</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/6Ha1gWWtduPiykfY8">
                <img src="../foto/situsarca.jpg" alt="Situs arca">
                <div class="overlay">Situs Cibalay</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://pergikuliner.com/restaurants/bogor/soto-bogor-pa-salam-bogor-timur">
                <img src="../foto/sotobogor.jpg" alt="Soto Bogor Pa' Salam">
                <div class="overlay">Soto Bogor Pa' Salam</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://pergikuliner.com/restaurants/bogor/soto-kuning-bogor-pak-m-yusuf-bogor-tengah">
                <img src="../foto/sotokuningpakyusuf.jpg" alt="Soto Kuning Pak Yusuf">
                <div class="overlay">Soto Kuning Pak Yusuf</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/JpnA3eKeaRMLTZKH6">
                <img src="../foto/tajurtrade.jpg" alt="Tajur Trade">
                <div class="overlay">Tajur Trade</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/xm8iM4q4kRfSTzqBA">
                <img src="../foto/tamanangklung.jpeg" alt="Taman Angklung">
                <div class="overlay">Taman Angklung</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.trip.com/travel-guide/attraction/bogor-city/taman-bangbarung-138027707/">
                <img src="../foto/tamanbangbarung.jpg" alt="Taman Bangbarung">
                <div class="overlay">Taman Bangbarung</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.99.co/id/projects/taman-dhika-batu-tulis-2894">
                <img src="../foto/tamanbatutulis.jpg" alt="Taman Batu Tulis">
                <div class="overlay">Taman Batu Tulis</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/R9jjdo5chsN9mCwj9">
                <img src="../foto/tamanbubulak.jpg" alt="Taman Bubulak">
                <div class="overlay">Taman Bubulak</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/hD3MZeZXApzt6UTz8">
                <img src="../foto/tamancipaku.jpg" alt="Taman Cipaku">
                <div class="overlay">Taman Cipaku</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/88q4CCxnRBByeypL6">
                <img src="../foto/tamangandaria.jpg" alt="Taman Gandaria">
                <div class="overlay">Taman Gandaria</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/Ff7ipP3Wnq2JqFbWA">
                <img src="../foto/tamanheulang.jpg" alt="Taman Heulang">
                <div class="overlay">Taman Heulang</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/YmoZug6a4m7484497">
                <img src="../foto/Tamankencana.jpg" alt="Taman Kencana">
                <div class="overlay">Taman Kencana</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/9S67p9XQRkBdJ6GDA">
                <img src="../foto/tamanmarsgriya.jpg" alt="Taman Mars Griya">
                <div class="overlay">Taman Mars Griya</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://bogor.tamansafari.com/">
                <img src="../foto/tamansafari.jpeg" alt="Taman Safari Bogor">
                <div class="overlay">Taman Safari Bogor</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.viewjabar.com/daerah/80711037173/agro-wisata-taman-tanah-sareal-bogor-dilengkapi-wisata-edukasi-sport-center-kuliner-dan-wisata-belanja">
                <img src="../foto/tamantanahsareal.jpg" alt="Taman Tanah Sareal">
                <div class="overlay">Taman Tanah Sareal</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/hQfUCqDtuQoNWw639">
                <img src="../foto/tirtania.jpg" alt="Tirtania">
                <div class="overlay">Tirtania</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://maps.app.goo.gl/EcnD7DFJUMdYZMXu7">
                <img src="../foto/transmartyasmin.jpg" alt="Transmart Yasmin">
                <div class="overlay">Transmart Yasmin</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.tripadvisor.co.id/Attraction_Review-g297706-d13151574-Reviews-Vihara_Buddha_Dharma_8_Pho_Sat-Bogor_West_Java_Java.html">
                <img src="../foto/vihara_dharma.jpg" alt="Vihara Dharma">
                <div class="overlay">Vihara Dharma</div>
            </a>
        </div>
        <div class="image-container">
            <a href="https://www.waroengngariung.com/">
                <img src="../foto/waroengngariung.jpg" alt="Waroeng Ngariung">
                <div class="overlay">Waroeng Ngariung</div>
            </a>
        </div>
        <!-- Add more images as needed -->
    </div>
    <footer>
        <div class="container">
            <p class="poppins">&copy; 2023 Wisata Bogor. Hak Cipta Dilindungi.</p>
        </div>
    </footer>
</body>
</html>
