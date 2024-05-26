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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Detail Wisata</title>
    <style>
        body {
    line-height: 1.6;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        #wisataContainer {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .wisata-item {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .wisata-content {
            display: flex;
            flex-wrap:wrap;
            flex-direction: row;
            align-items: center;
        }

        .wisata-content img {
            width: 500px;
            height: 300px;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
            border:2px solid
        }


        .wisata-content iframe {
            width: 100%;
            height: 300px;
            border-top-right-radius:15px;
            border-bottom-right-radius:15px;
        }

        .wisata-item h2 {
            margin-top: 10px; 
        }
        @media (min-width: 768px) {
            .wisata-item img, .wisata-item iframe {
                width: 50%;
            }

            .wisata-item div {
                width: 50%;
                padding-left: 20px;
            }
        } 
        .poppins{
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-style: bold;
            color:#5E5DA6;
        }   
    </style>
</head>
<body class="poppins">
    <div id="btn-back"></div>
    <div id="judul"></div>
    <div id="detailWisata"></div>

    <script>
        function formatText(text) {
    return text
        .split('_')
        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
        .join(' ');
}
    </script>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const kategori = urlParams.get('kategori');
        const kecamatan = urlParams.get('kecamatan');
        const formattedKategori = formatText(kategori);
        const formattedKecamatan = formatText(kecamatan);

        const dataWisata = {
            'wisata_alam': {
                'bogor_selatan': ['Tirtania WaterPark', 'The Jungle Water Adventure'],
                'bogor_utara': ['Istana Bogor', 'Taman Safari Indonesia'],
                'bogor_timur': ['Kuntum Farmfield', 'Taman Wisata Matahari'],
                'bogor_barat': ['Ekowisata Situ Gede'],
                'bogor_tengah': ['Sempur Park', 'Kebun Raya Bogor', 'Taman Kencana', 'Bogor Botanical Gardens'],
                'tanah_sereal': ['Marcopolo Water Adventure', 'Taman Bunga Nusantara']
            },
            'pusat_perbelanjaan': {
                'bogor_selatan': ['Tajur Trade Mall', 'Pasar Ledeng'],
                'bogor_utara': ['Pasar Jambu Dua', 'Pasar Tanah Baru'],
                'bogor_timur': ['Lippo Plaza Ekalokasari Bogor', 'BOXIES 123 Mall Bogor'],
                'bogor_barat': ['BTW Mall', 'Pasar Gunung Batu'],
                'bogor_tengah': ['Lippo Plaza Keboen Raya', 'Mall BTM Bogor'],
                'tanah_sereal': ['MODERN MARKET KEMENANGAN', 'Transmart Yasmin Bogor']
            },
            'taman_hiburan': {
                'bogor_selatan': ['Taman Cipaku', 'Taman Batutulis'],
                'bogor_utara': ['Taman Bangbarung', 'Taman Gandaria'],
                'bogor_timur': ['Taman Mars Griya Bogor Raya', 'Taman Angklung'],
                'bogor_barat': ['Taman Bubulak', 'Manunggal Park'],
                'bogor_tengah': ['Taman Kencana', 'Taman Sempur'],
                'tanah_sereal': ['Taman Tanah Sareal', 'Taman Heulang']
            },
            'kuliner': {
                'bogor_selatan': ['Waroeng Ngariung', 'Sate Maranggi'],
                'bogor_utara': ['Gurih 7 Bogor Indonesia', 'RM. Bumi Aki Bogor'],
                'bogor_timur': ['Soto Bogor Pa\' Salam', 'De\' Leuit Jambal Rice Sensation'],
                'bogor_barat': ['Rumah Makan Bunut Semeru', 'Soto Kuning PAK YUSUP'],
                'bogor_tengah': ['Saung Pak Ewok', 'Cungkring Pak Jum\'at'],
                'tanah_sereal': ['Bebek Pak Ndut Bogor Air Mancur', 'Saung Kuring Sundanese Restaurant']
            },
            'wisata_sejarah': {
                'bogor_selatan': ['Prasasti Batu Tulis', 'Situs Arca Puragalih'],
                'bogor_utara': [''],
                'bogor_timur': ['Kujang Monument'],
                'bogor_barat': [''],
                'bogor_tengah': ['Museum of Zoology (Museum Zoologicum Bogoriense)', 'Museum PETA'],
                'tanah_sereal': ['']
            },
            'wisata_religi': { 
                'bogor_selatan': ['Masjid An-Nur', 'Makam Keramat Empang Bogor'],
                'bogor_utara': ['Masjid Al Mustofa', 'Makam "Keramat" Kuno'],
                'bogor_timur': ['Masjid Raya Bogor'],
                'bogor_barat': [''],
                'bogor_tengah': ['Masjid Agung Bogor', 'Vihara Dharma Surya', 'Gereja Katedral Bogor'],
                'tanah_sereal': ['']
            }
        };
        
        const detailWisata = dataWisata[kategori][kecamatan].map(wisata => {
            let deskripsi = '';
            switch (wisata) {
                case 'Tajur Trade Mall':
                    deskripsi = 'Tajur Trade Mall merupakan magnet bagi pengunjung di Bogor Selatan, sebuah pusat perbelanjaan terbesar yang mengagumkan. Mall ini tidak hanya menyajikan beragam produk terbaru, namun juga menawarkan fasilitas yang mengundang untuk dinikmati.';
                    imageSrc = '../foto/tajurtrade.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0455480088053!2d106.8357784!3d-6.641266300000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8bc0b8e43fd%3A0xe536ac76927933b3!2sTajur%20Trade%20Mall!5e0!3m2!1sid!2sid!4v1716717872010!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Pasar Ledeng':
                    deskripsi = 'Pasar Ledeng, salah satu pasar tradisional yang ikonis di Bogor Selatan, adalah tempat di mana Anda bisa merasakan nuansa khas kegiatan belanja. Selain menjadi pusat perdagangan lokal, pasar ini menawarkan beragam produk lokal yang berkualitas tinggi, mengundang pengunjung untuk menjelajahi setiap sudutnya.';
                    imageSrc = '../foto/pasarledeng.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d63412.65507144989!2d106.7186313!3d-6.610726!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5eb28b490d5%3A0x499ab6f05414ba2!2sPasar%20Ledeng!5e0!3m2!1sid!2sid!4v1716719655888!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Tirtania WaterPark':
                    deskripsi = 'Tirtania WaterPark adalah destinasi liburan yang sempurna bagi Anda dan keluarga serta teman-teman. Dengan berbagai wahana seru dan atraksi menarik, pengalaman yang mengasyikkan pasti akan Anda temukan di sini. Rasakan keseruan menyeluncur di perosotan air, bermain di kolam renang, atau hanya bersantai di tepi kolam sambil menikmati suasana yang menyegarkan.';
                    imageSrc = '../foto/tirtania.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0486517462778!2d106.8054381!3d-6.6408809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cf45761aef95%3A0x3c3cbce87427ea24!2sTirtania%20WaterPark!5e0!3m2!1sid!2sid!4v1716719683544!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'The Jungle Water Adventure':
                    deskripsi = 'The Jungle Water Adventure adalah tempat rekreasi air yang memikat dengan beragam wahana seru dan menarik. Tak ada tempat yang lebih pas untuk berbagi momen bahagia dengan keluarga atau sahabat terdekat Anda. Nikmati sensasi petualangan di setiap sudut taman air ini, dari perosotan yang menggoda hingga kolam renang yang menyegarkan.';
                    imageSrc = '../foto/jungle.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.1001786494044!2d106.7949215!3d-6.634479400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cf5deba619f3%3A0x485a13f031e8b904!2sThe%20Jungle%20Waterpark%20Bogor!5e0!3m2!1sid!2sid!4v1716719699562!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Istana Bogor':
                    deskripsi = 'Istana Bogor merupakan gemerlap kejayaan masa lalu yang terhampar megah di tengah Bogor Utara. Dengan keindahan arsitektur dan taman yang memesona, istana ini memancarkan aura kebesaran dan keanggunan. Sebagai peninggalan bersejarah, tempat ini tak hanya memikat wisatawan dengan pesonanya, tetapi juga memberikan pengalaman yang memperkaya pengetahuan tentang warisan budaya Indonesia.';
                    imageSrc = '../foto/istanabogor.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.3928273059637!2d106.79746659999999!3d-6.5980046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5c62d7196cd%3A0xb9728ad803356b26!2sIstana%20Bogor%2C%20Paledang%2C%20Kecamatan%20Bogor%20Tengah%2C%20Kota%20Bogor%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1716719732526!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Safari Indonesia':
                    deskripsi = 'Taman Safari Indonesia adalah salah satu taman safari terbaik di Indonesia. Anda dapat melihat berbagai jenis satwa liar dari dekat dan bahkan memberi makan beberapa di antaranya.';
                    imageSrc = '../foto/tamansafari.jpeg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15849.510178391267!2d106.9429042!3d-6.7237025!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b5cf14e6ee83%3A0x6586bb20b8f11d9!2sTaman%20Safari%20Indonesia%20Bogor!5e0!3m2!1sid!2sid!4v1716719745667!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Kuntum Farmfield':
                    deskripsi = 'Kuntum Farmfield adalah surga petualangan bagi keluarga yang haus akan kegembiraan di alam terbuka. Di sini, Anda tidak hanya akan menemukan keindahan alam yang memikat, tetapi juga beragam aktivitas seru yang menantang. Dari peternakan hingga kebun buah-buahan, setiap sudut Kuntum Farmfield memancarkan pesona yang memikat. Inilah tempat ideal untuk mengisi waktu liburan bersama keluarga sambil menciptakan kenangan tak terlupakan.';
                    imageSrc = '../foto/kuntum.jpeg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.04266154922!2d106.83971799999999!3d-6.6416246999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8afbcd991af%3A0xaa9e0764f8512c63!2sKuntum%20Farmfield!5e0!3m2!1sid!2sid!4v1716719757668!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Wisata Matahari':
                    deskripsi = 'Taman Wisata Matahari adalah surga rekreasi bagi semua kalangan usia, dengan ragam wahana seru yang menantang adrenalin Anda. Mulai dari wahana yang memacu jantung hingga yang lebih santai, setiap sudut taman ini menawarkan petualangan yang tak terlupakan. Jadikan liburan Anda berkesan dengan mengunjungi Taman Wisata Matahari!';
                    imageSrc = '../foto/tamanwisatamatahari.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7925.847175001136!2d106.913112!3d-6.6563929!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b64b07d6acd3%3A0x59e3f3696bd859a8!2sTaman%20Wisata%20Matahari!5e0!3m2!1sid!2sid!4v1716719773412!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Ekowisata Situ Gede':
                    deskripsi = 'Ekowisata Situ Gede adalah surganya pecinta alam, menawarkan keindahan alam yang memesona dan lingkungan yang masih alami. Di sini, Anda dapat menikmati aktivitas rekreasi seperti memancing atau sekadar meresapi keindahan pemandangan sekitar. Dengan udara segar dan keindahan alam yang menenangkan, Ekowisata Situ Gede menjadi tempat ideal untuk melepas penat dan menyegarkan pikiran.';
                    imageSrc = '../foto/situgede.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7619716200716!2d106.7457227!3d-6.5517073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c59d88a69ed5%3A0x19760dcbc17a1dec!2sEkowisata%20Situ%20Gede!5e0!3m2!1sid!2sid!4v1716719902358!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Sempur Park':
                    deskripsi = 'Sempur Park adalah oase hijau di tengah kota Bogor yang luas dan indah. Tempat ini sempurna untuk berjalan-jalan santai di antara pepohonan rindang atau menghabiskan waktu berkualitas bersama keluarga. Dengan suasana yang tenang dan udara segar, Sempur Park menjadi tempat yang menyegarkan untuk melepas penat dari hiruk pikuk perkotaan.';
                    imageSrc = '../foto/tamansempur.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.443163530291!2d106.8008294!3d-6.5917106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5cc1ab57851%3A0x923a0054edb53cfc!2sTaman%20Sempur!5e0!3m2!1sid!2sid!4v1716719918131!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Kebun Raya Bogor':
                    deskripsi = 'Kebun Raya Bogor adalah surga tumbuhan yang menakjubkan, menawarkan koleksi tumbuhan langka dan indah yang memikat. Di sini, Anda tidak hanya dapat belajar tentang beragam flora yang ada di Indonesia dan dunia, tetapi juga menikmati momen bersantai di tengah keindahan alam yang menakjubkan. Dengan udara segar dan pemandangan yang menenangkan, Kebun Raya Bogor menjadi tempat yang sempurna untuk merenungkan keajaiban alam semesta sambil menimba pengetahuan baru.';
                    imageSrc = '../foto/kebunrayabogor.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.395833306532!2d106.7995698!3d-6.5976289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5c412a67abb%3A0x75f23c6b45a37ee5!2sKebun%20Raya%20Bogor!5e0!3m2!1sid!2sid!4v1716719945115!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Kencana':
                    deskripsi = 'Taman Kencana adalah oase keluarga yang penuh warna, menawarkan beragam fasilitas dan wahana bermain yang menyenangkan bagi anak-anak. Di sini, Anda dapat menikmati momen berharga bersama keluarga sambil bermain dan tertawa. Dengan suasana yang ramah dan penuh keceriaan, Taman Kencana menjadi tempat yang sempurna untuk menghabiskan waktu berkualitas bersama orang yang tersayang.';
                    imageSrc = '../foto/Tamankencana.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4665079600395!2d106.8018857!3d-6.5887896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5cceda8f1b7%3A0x7d403349dcdbdc93!2sTaman%20Kencana!5e0!3m2!1sid!2sid!4v1716719957675!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Bogor Botanical Gardens':
                    deskripsi = 'Bogor Botanical Gardens, atau yang dikenal juga sebagai Kebun Raya Bogor, merupakan salah satu kebun botani terbesar di Asia yang memukau. Dengan koleksi tumbuhan langka dan indah yang dipamerkan, tempat ini adalah surga bagi pecinta alam. Setiap sudut kebun menawarkan keindahan alam yang memikat, memperkaya pengetahuan dan pengalaman pengunjung tentang keragaman hayati. Dari pohon langka hingga tanaman endemik, setiap kunjungan ke Bogor Botanical Gardens akan memberikan pengalaman yang memukau dan mendalam tentang keajaiban alam.';
                    imageSrc = '../foto/bogorbotani.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.395833306532!2d106.7995698!3d-6.5976289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5c412a67abb%3A0x75f23c6b45a37ee5!2sKebun%20Raya%20Bogor!5e0!3m2!1sid!2sid!4v1716719945115!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Marcopolo Water Adventure':
                    deskripsi = 'Marcopolo Water Adventure adalah destinasi liburan yang sempurna bagi pecinta petualangan air. Dengan berbagai wahana seru dan menyenangkan, tempat ini akan membuat liburan Anda tak terlupakan. Nikmati keseruan bermain air bersama keluarga dan teman-teman, dan buat kenangan indah yang akan dikenang selamanya. Jadikan liburan Anda lebih berkesan dengan mengunjungi Marcopolo Water Adventure!';
                    imageSrc = '../foto/marcopolo.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.795189496644!2d106.7826826!3d-6.5475252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c384e7c466b3%3A0x1d98d777db19c08f!2sMarcopolo%20Water%20Adventure%20Bogor!5e0!3m2!1sid!2sid!4v1716720002276!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Bunga Nusantara':
                    deskripsi = 'Taman Bunga Nusantara adalah surga bagi pecinta alam dan keindahan. Dengan koleksi bunga yang memukau dari berbagai penjuru Nusantara, tempat ini menghadirkan pesona alam yang memikat hati. Nikmati momen indah di antara kebun-kebun yang berbunga warna-warni dan terpesona oleh keanekaragaman flora Indonesia. Jadikan kunjungan Anda sebagai pengalaman yang menginspirasi dan memperkaya pengetahuan tentang kekayaan alam Indonesia. Ayo, jelajahi Taman Bunga Nusantara dan saksikan keajaiban alam yang memikat di setiap langkahnya!';
                    imageSrc = '../foto/tamanbunga.jpeg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.3450003173434!2d107.0794044!3d-6.7276929999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b3e586b6266d%3A0x1c9b14260d4319ab!2sTaman%20Bunga%20Nusantara!5e0!3m2!1sid!2sid!4v1716720017993!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Cipaku':
                    deskripsi = 'Taman Cipaku adalah tempat yang sempurna untuk menghabiskan waktu bersama keluarga dan teman-teman. Dengan beragam wahana seru yang ditawarkan, Anda pasti akan merasakan kegembiraan yang tiada tara di sini. Rasakan sensasi keceriaan dan keseruan melalui wahana-wahana yang menghibur dan menantang. Dari wahana permainan yang mengasyikkan hingga kegiatan rekreasi yang menyenangkan, setiap kunjungan ke Taman Cipaku akan menjadi momen yang tak terlupakan. Jadi, jadwalkan perjalanan Anda sekarang dan buat kenangan indah di tengah keceriaan Taman Cipaku!';
                    imageSrc = '../foto/tamancipaku.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.1314417196813!2d106.8128536!3d-6.630592399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cf5640ad5921%3A0x7265f5e0934342ee!2sTaman%20Cipaku!5e0!3m2!1sid!2sid!4v1716720036204!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Batutulis':
                    deskripsi = 'Taman Batutulis adalah oase alami yang menawarkan udara segar dan pemandangan yang memesona. Di sini, Anda dapat melarikan diri dari hiruk pikuk kehidupan kota dan membenamkan diri dalam kedamaian alam. Jadikan tempat ini sebagai tempat untuk bersantai dan menyegarkan pikiran, sambil menikmati keindahan alam yang tiada duanya. Nikmati kehangatan matahari, dikelilingi oleh pepohonan hijau dan aroma bunga-bunga yang harum.';
                    imageSrc = '../foto/tamanbatutulis.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.17840897198!2d106.8090093!3d-6.6247486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5f907f40e63%3A0x62127bb475224ba!2sTaman%20Batutulis!5e0!3m2!1sid!2sid!4v1716720061751!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Bangbarung':
                    deskripsi = 'Taman Bangbarung adalah destinasi yang sempurna untuk seluruh keluarga, dengan berbagai wahana bermain yang menghibur untuk anak-anak dan tempat bersantai yang menenangkan untuk orang dewasa. Di sini, Anda bisa merasakan kegembiraan anak-anak yang bermain dengan riang di wahana seru, sementara orang dewasa dapat menikmati momen ketenangan sambil menyaksikan keceriaan keluarga. Jadikan kunjungan ke Taman Bangbarung sebagai waktu berkualitas bersama keluarga, menciptakan kenangan indah yang akan dikenang selamanya.';
                    imageSrc = '../foto/tamanbangbarung.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.522142962152!2d106.81779920000001!3d-6.581823000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c53c2c711705%3A0x434ff3cb52442458!2sTaman%20Bangbarung!5e0!3m2!1sid!2sid!4v1716720075144!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Gandaria':
                    deskripsi = 'Taman Gandaria adalah oase keindahan di tengah kota, menyuguhkan pesona alam yang memukau dan berbagai fasilitas rekreasi untuk semua anggota keluarga. Di sini, Anda dapat menikmati udara segar sembari menjelajahi keindahan taman, bermain dengan riang di berbagai fasilitas rekreasi yang tersedia, serta menciptakan momen tak terlupakan bersama keluarga dan teman-teman. Jadikan kunjungan Anda ke Taman Gandaria sebagai peluang untuk bersantai, menghilangkan stres, dan menikmati keindahan alam yang menyegarkan.';
                    imageSrc = '../foto/tamangandaria.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5928067603677!2d106.81727800000002!3d-6.5729638999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c42764e19d79%3A0xd89b22b2b1ee1606!2sTaman%20Gandaria!5e0!3m2!1sid!2sid!4v1716720108004!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Mars Griya Bogor Raya':
                    deskripsi = 'Taman Mars Griya Bogor Raya adalah destinasi rekreasi yang menjanjikan keseruan tiada akhir bagi seluruh anggota keluarga dan teman-teman. Dengan beragam wahana seru dan menyenangkan, tempat ini menyajikan pengalaman yang tak terlupakan bagi pengunjungnya. Jadikan setiap momen di Taman Mars Griya Bogor Raya sebagai petualangan yang menghibur dan mendebarkan, sambil menikmati kebersamaan yang penuh sukacita dengan orang-orang tercinta.';
                    imageSrc = '../foto/tamanmarsgriya.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.261702021168!2d106.8228731!3d-6.614372399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c73ed7bd7b73%3A0x705ebdf76cd8d171!2sTaman%20Mars!5e0!3m2!1sid!2sid!4v1716720120829!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Angklung':
                    deskripsi = 'Taman Angklung adalah tempat yang menghadirkan keseruan tiada tara dengan beragam wahana seru dan pertunjukan hiburan tradisional yang menawan. Nikmati liburan Anda dengan berkunjung ke tempat ini dan rasakan kegembiraan yang tak terlupakan bersama keluarga dan teman-teman!';
                    imageSrc = '../foto/tamanangklung.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2028672.3269891017!2d105.8942167!3d-6.7392501!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c60c537883bf%3A0x2ab90d76873a4697!2sTaman%20Angklung!5e0!3m2!1sid!2sid!4v1716720135291!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Bubulak':
                    deskripsi = 'Taman Bubulak adalah tempat yang menyenangkan di tengah kesibukan kota, dengan beragam wahana bermain untuk anak-anak dan spot-spot santai bagi orang dewasa. Rasakan kehangatan keluarga dan keceriaan di tempat ini, ideal untuk menghabiskan waktu bersama yang berharga.';
                    imageSrc = '../foto/tamanbubulak.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.6673319506917!2d106.7550868!3d-6.563607799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5a440b61a83%3A0x315db3a5c9db959c!2sTaman%20Bubulak!5e0!3m2!1sid!2sid!4v1716720148688!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Manunggal Park':
                    deskripsi = 'Manunggal Park adalah tempat yang lengkap dengan berbagai fasilitas rekreasi dan area bersantai untuk semua anggota keluarga. Di sini, Anda bisa menikmati momen berharga bersama orang-orang terkasih dalam suasana yang menyenangkan. Temukan keseruan dan kehangatan keluarga di taman ini!';
                    imageSrc = '../foto/manunggalpark.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5168244499087!2d106.7870923!3d-6.5824893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5f4606253d3%3A0x524ff75ec9a60e21!2sTaman%20Manunggal!5e0!3m2!1sid!2sid!4v1716720166707!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Tanah Sareal':
                    deskripsi = 'Taman Tanah Sareal adalah perpaduan sempurna antara keindahan alam dan fasilitas rekreasi untuk semua kalangan. Dengan beragam fasilitas yang ditawarkan, mulai dari area bermain hingga tempat bersantai, taman ini menjadi destinasi liburan yang ideal untuk seluruh keluarga. Rasakan pesonanya dan nikmati momen berharga di sini!';
                    imageSrc = '../foto/tamantanahsereal.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.6814100876304!2d106.80057649999999!3d-6.5618389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c54911ebf321%3A0xe940a524537fbcf7!2sTaman%20Tanah%20Sareal!5e0!3m2!1sid!2sid!4v1716720180332!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Taman Heulang':
                    deskripsi = 'Taman Heulang memukau dengan keindahan alamnya dan udara segar yang menyegarkan. Tempat ini adalah pilihan sempurna untuk berjalan-jalan santai atau mengadakan piknik bersama keluarga. Nikmati momen berharga di tengah pesona alam yang menakjubkan!';
                    imageSrc = '../foto/tamanheulang.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.6186489658653!2d106.80229469999999!3d-6.5697211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c43c4d9f6e9f%3A0x7494ee2a6fb643fa!2sTaman%20Heulang!5e0!3m2!1sid!2sid!4v1716720216720!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Waroeng Ngariung':
                    deskripsi = 'Waroeng Ngariung merupakan tempat makan yang istimewa, menawarkan beragam masakan tradisional dan lokal yang menggugah selera. Rasakan kenikmatan hidangan lezat dalam suasana yang nyaman dan ramah, sempurna untuk menikmati santap bersama keluarga dan teman-teman!';
                    imageSrc = '../foto/waroengngariung.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.229111343277!2d106.80841129999999!3d-6.618434299999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5fadb5feae3%3A0xa36a705ff4b29aa3!2sWaroeng%20Ngariung!5e0!3m2!1sid!2sid!4v1716720228966!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Sate Maranggi':
                    deskripsi = 'Sate Maranggi adalah restoran yang terkenal dengan sate khas Bogor yang lezat dan bumbu yang khas. Jadikan tempat ini sebagai destinasi kuliner Anda di Bogor!';
                    imageSrc = '../foto/satemaranggi.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126823.39921083637!2d106.7261803!3d-6.6181709!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8be899ccb2b%3A0xc5f607a0df76f07c!2sSate%20Maranggi%20SN4444%20-%20Tajur!5e0!3m2!1sid!2sid!4v1716720242448!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Gurih 7 Bogor Indonesia':
                    deskripsi = 'Gurih 7 Bogor Indonesia adalah tempat yang memukau bagi pencinta kuliner, menghidangkan masakan tradisional Indonesia dengan cita rasa otentik yang lezat. Dengan suasana yang nyaman dan ramah, Anda akan menemukan diri Anda tenggelam dalam pengalaman kuliner yang tak terlupakan. Rasakan kelezatan tiap suapan dan nikmati setiap momen di restoran ini!';
                    imageSrc = '../foto/gurih7bogor.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5850646973604!2d106.8075456!3d-6.573935099999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c416cbdea47b%3A0x950e04927f76531f!2sGurih%207%20Bogor%20-%20Saung%20Lesehan%20%26%20Kuliner%20Sunda!5e0!3m2!1sid!2sid!4v1716720253616!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'RM. Bumi Aki Bogor':
                    deskripsi = 'RM. Bumi Aki Bogor adalah surga bagi pencinta kuliner, terkenal dengan hidangan masakan Sunda yang lezat dan autentik. Dengan setiap suapan, Anda akan merasakan sentuhan khas dari masakan tradisional yang disajikan dengan penuh keahlian. Jadikan tempat ini sebagai tujuan kuliner Anda di Bogor, dan nikmati pengalaman gastronomi yang tak terlupakan di sini!';
                    imageSrc = '../foto/rmbumiaki.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5049578378043!2d106.80580529999999!3d-6.5839757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4327f76fdd7%3A0x64e104abdaf4adee!2sRM.%20Bumi%20Aki%20Bogor!5e0!3m2!1sid!2sid!4v1716720271620!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Soto Bogor Pa\' Salam':
                    deskripsi = 'Soto Bogor Pa\' Salam adalah tempat yang tak boleh dilewatkan bagi pencinta kuliner, terkenal dengan soto khas Bogor yang lezat dan bumbu yang khas. Di sini, Anda dapat menikmati hidangan yang lezat dengan suasana yang nyaman dan ramah, menciptakan pengalaman makan yang tak terlupakan. Rasakan kenikmatan cita rasa otentik yang disajikan dengan penuh kehangatan.';
                    imageSrc = '../foto/sotobogor.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.2920458470935!2d106.80530619999999!3d-6.6105883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e885600bbd%3A0x55ae03baac42e0c5!2sSoto%20Pak%20Salam%20Bogor!5e0!3m2!1sid!2sid!4v1716720286695!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'De\' Leuit Jambal Rice Sensation':
                    deskripsi = 'De\' Leuit Jambal Rice Sensation adalah restoran yang harus Anda kunjungi jika Anda menyukai hidangan nasi jambal yang lezat dan bumbu yang khas. Di sini, Anda akan menemukan berbagai variasi hidangan yang memikat lidah. Jadikan tempat ini sebagai destinasi kuliner utama Anda di Bogor, dan nikmati pengalaman kuliner yang tak terlupakan!';
                    imageSrc = '../foto/deleuitbogor.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.319456768902!2d106.8103258!3d-6.6071681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5dd8bec966d%3A0xe828851b2412c428!2sDe&#39;%20Leuit%20Sensasi%20Nasi%20Jambal!5e0!3m2!1sid!2sid!4v1716720302599!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Rumah Makan Bunut Semeru':
                    deskripsi = 'Rumah Makan Bunut Semeru adalah surga bagi pecinta nasi kuning yang mencari hidangan lezat dengan bumbu yang khas. Di sini, Anda akan disajikan dengan hidangan yang tak hanya menggugah selera, tetapi juga mengundang kenikmatan. Dengan suasana yang nyaman dan ramah, pastikan Anda merencanakan kunjungan ke tempat ini untuk pengalaman kuliner yang memuaskan!';
                    imageSrc = '../foto/rumahmakanbunut.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5177448311415!2d106.77892999999999!3d-6.582374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c451630dc049%3A0xfa4efe5ad19dcfea!2sRumah%20Makan%20Bunut%20Semeru!5e0!3m2!1sid!2sid!4v1716723595235!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Soto Kuning PAK YUSUP':
                    deskripsi = 'Soto Kuning PAK YUSUP adalah destinasi wajib bagi pecinta kuliner yang menginginkan cita rasa autentik soto kuning khas Bogor. Dengan resep warisan turun temurun, hidangan lezat dengan bumbu yang khas ini akan memanjakan lidah Anda. Jangan lewatkan kesempatan untuk menikmati hidangan yang menggugah selera ini ketika Anda berada di Bogor!';
                    imageSrc = '../foto/sotokuningpakyusuf.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.2973709319103!2d106.80407249999999!3d-6.609923999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e85c320605%3A0x1d010376a2d6491b!2sSoto%20Kuning%20PAK%20YUSUP%20pake%20P%20ASLI!5e0!3m2!1sid!2sid!4v1716723684105!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Saung Pak Ewok':
                    deskripsi = 'Saung Pak Ewok adalah tempat yang sempurna untuk menjelajahi kelezatan kuliner tradisional Indonesia. Dengan cita rasa otentik dan lezat, hidangan-hidangannya mengundang Anda untuk menikmati kelezatan khas Indonesia. Suasana yang nyaman dan ramah membuat pengalaman makan Anda di sini menjadi lebih berkesan. Sambutlah kenikmatan kuliner Indonesia yang sesungguhnya di Saung Pak Ewok!';
                    imageSrc = '../foto/saungpakewok.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.3842092132177!2d106.8069985!3d-6.5990816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4332a60d2e3%3A0x677b65157360c51d!2sSAUNG%20PAK%20EWOK!5e0!3m2!1sid!2sid!4v1716723799745!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Cungkring Pak Jum\'at':
                    deskripsi = 'Cungkring Pak Jum\'at adalah surganya cita rasa masakan Sunda yang otentik dan menggugah selera. Terkenal dengan hidangan-hidangan lezatnya, restoran ini menjadi pilihan tepat bagi pecinta kuliner yang ingin menjelajahi kekayaan rasa tradisional Indonesia. Dengan suasana yang hangat dan pelayanan yang ramah, Cungkring Pak Jum\'at siap menyambut Anda untuk mengalami kenikmatan kuliner yang tak terlupakan di Bogor!';
                    imageSrc = '../foto/cungkring.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.2978991628197!2d106.8044699!3d-6.6098581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e85c2b8c63%3A0xf2b7697040c0706a!2sCungkring%20Pak%20Jum&#39;at!5e0!3m2!1sid!2sid!4v1716723811093!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Bebek Pak Ndut Bogor Air Mancur':
                    deskripsi = 'Bebek Pak Ndut Bogor Air Mancur menawarkan kelezatan sejati dengan hidangan bebek panggangnya yang menggugah selera. Terkenal dengan bumbu khas yang memikat, restoran ini tak hanya memanjakan lidah Anda dengan cita rasa yang lezat, tetapi juga dengan suasana yang nyaman dan pelayanan yang ramah. Jadikan Bebek Pak Ndut Bogor Air Mancur sebagai tempat pilihan Anda untuk menikmati santapan istimewa dan momen berharga bersama keluarga dan teman-teman!';
                    imageSrc = '../foto/bebekpakndut.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5420042180153!2d106.7965548!3d-6.579334200000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c58834af952d%3A0xfab6a58b78901779!2sBebek%20Pak%20Ndut%20Bogor%20Air%20Mancur!5e0!3m2!1sid!2sid!4v1716723827434!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Saung Kuring Sundanese Restaurant':
                    deskripsi = 'Saung Kuring Sundanese Restaurant adalah surga bagi pencinta kuliner yang menghargai cita rasa otentik masakan Sunda. Terkenal dengan hidangan lezat dan autentik, restoran ini menghadirkan ragam sajian yang menggugah selera, mulai dari sate, ikan bakar, hingga sayur asem. Jadikan Saung Kuring sebagai destinasi kuliner utama Anda di Bogor, di mana Anda dapat menikmati kelezatan masakan tradisional Sunda sambil menikmati suasana yang ramah dan hangat.';
                    imageSrc = '../foto/saungkuring.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.6825989437602!2d106.79895220000002!3d-6.5616895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c41465e6ee07%3A0x859cbc60e39af0fb!2sSaung%20Kuring!5e0!3m2!1sid!2sid!4v1716723842622!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Prasasti Batu Tulis':
                    deskripsi = 'Prasasti Batu Tulis adalah salah satu situs sejarah yang paling penting di Bogor Selatan. Selain menjadi penanda sejarah yang kaya, prasasti ini juga sering dijadikan tujuan wisata sejarah bagi pengunjung yang ingin menyelami kekayaan warisan budaya daerah. Dengan nilai sejarah yang tinggi, Prasasti Batu Tulis menjadi saksi bisu perkembangan zaman, menggambarkan kejayaan masa lampau yang terus dihargai hingga kini.';
                    imageSrc = '../foto/prasastibatutulis.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.187162448027!2d106.8089952!3d-6.623658900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c80b1e4ec2f1%3A0x494fbc07f23d1437!2sPrasasti%20Batu%20Tulis!5e0!3m2!1sid!2sid!4v1716723866497!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Situs Arca Puragalih':
                    deskripsi = 'Situs Arca Puragalih merupakan harta karun arkeologi yang menampilkan banyak arca dan artefak bersejarah yang mengagumkan. Tempat ini bukan hanya sebuah destinasi wisata, tetapi juga menjadi sumber pengetahuan yang tak ternilai tentang sejarah dan budaya Bogor. Dengan menjadikan Situs Arca Puragalih sebagai tujuan perjalanan, Anda dapat meresapi kekayaan budaya dan sejarah yang tersembunyi di balik setiap patung dan artefak yang dipamerkan, sambil memperkaya pemahaman tentang masa lalu kota ini.';
                    imageSrc = '../foto/situsarca.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d253631.57096603498!2d106.5951259!3d-6.6477512!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5f906f7705f%3A0xf4792c45bdfaf48e!2zU2l0dXMgUHVyd2FrYWxpaCDhrp7hrqThrpLhrqXhrp7hrqog4a6V4a6l4a6B4a6d4a6K4a6c4a6k4a6C!5e0!3m2!1sid!2sid!4v1716723878109!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Kujang Monument':
                    deskripsi = 'Kujang Monument adalah monumen yang melambangkan simbol kebudayaan dan keberanian masyarakat Sunda. Tempat ini sering dijadikan sebagai ikon kota Bogor.';
                    imageSrc = '../foto/monumentkujang.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.3653189304387!2d106.80507379999999!3d-6.6014417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e100000001%3A0x1460e0034eb2eafc!2sTugu%20Kujang%20Bogor!5e0!3m2!1sid!2sid!4v1716723899844!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Museum of Zoology (Museum Zoologicum Bogoriense)':
                    deskripsi = 'Museum Zoologicum Bogoriense, atau lebih dikenal sebagai Museum of Zoology, merupakan tempat yang memamerkan beragam koleksi spesimen hewan dan ilmu biologi. Museum ini tidak hanya menyajikan pengetahuan tentang keanekaragaman hayati, tetapi juga menginspirasi pengunjung untuk menjaga dan menghargai alam. Dengan mengunjungi museum ini, Anda dan keluarga dapat memperluas pengetahuan tentang fauna dan memahami peran pentingnya dalam ekosistem global.';
                    imageSrc = '../foto/museumzoologi.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.347930663643!2d106.79693669999999!3d-6.6036133999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec63f041ec69%3A0xa401b9fca8c9e168!2sMuseum%20Zoologi!5e0!3m2!1sid!2sid!4v1716723912388!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Museum PETA':
                    deskripsi = 'Museum PETA merupakan sebuah institusi yang memamerkan berbagai koleksi yang berkaitan dengan Perjuangan Kemerdekaan Indonesia dari berbagai perspektif. Dengan menyoroti peran dan kontribusi PETA (Pembela Tanah Air) dalam perjuangan tersebut, museum ini menjadi tempat yang sangat menarik bagi para penggemar sejarah dan patriotisme. Pengunjung dapat mengalami perasaan yang mendalam tentang semangat dan perjuangan para pahlawan melalui artefak, dokumentasi, dan pameran yang disajikan secara menarik di museum ini.';
                    imageSrc = '../foto/museumpeta.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4953965051236!2d106.796318!3d-6.5851731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5cad48b2f63%3A0x1cc7fff1cbdf1d1c!2sMuseum%20%26%20Monumen%20PETA!5e0!3m2!1sid!2sid!4v1716723923652!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Masjid An-Nur':
                    deskripsi = 'Masjid An-Nur adalah sebuah bangunan megah dan indah yang berdiri anggun di Bogor Selatan. Selain sebagai tempat ibadah utama bagi umat Islam, masjid ini juga menjadi pusat kegiatan keagamaan dan kegiatan sosial bagi masyarakat sekitar. Dengan arsitektur yang menawan dan fasilitas yang lengkap, masjid ini menjadi tempat berkumpulnya umat Muslim untuk melaksanakan ibadah, mengikuti kegiatan keagamaan, serta berpartisipasi dalam berbagai kegiatan sosial yang bertujuan untuk memberikan manfaat bagi masyarakat sekitar.';
                    imageSrc = '../foto/masjid_an-nur.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31707.976926560903!2d106.7757612!3d-6.5849578!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5eaf00e3697%3A0xfc06a4a847047e8d!2sMasjid%20Kramat%20An%20Nur%20Empang%20Bogor.!5e0!3m2!1sid!2sid!4v1716723934634!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Makam Keramat Empang Bogor':
                    deskripsi = 'Makam Keramat Empang Bogor adalah sebuah tempat ziarah yang memiliki makna penting bagi umat Islam di Bogor Selatan. Tempat ini merupakan tempat suci yang sering dijadikan sebagai lokasi untuk berdoa, memohon berkah, dan mencari ketenangan spiritual. Para peziarah sering datang ke makam ini untuk mengunjungi dan menghormati para tokoh agama yang dimakamkan di sana serta berharap mendapatkan berkat dan perlindungan. Dengan suasana yang hening dan penuh kekhidmatan, Makam Keramat Empang Bogor menjadi tempat yang membangkitkan spiritualitas bagi para pengunjungnya.';
                    imageSrc = '../foto/makamkeramat.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31706.45410304604!2d106.7754309!3d-6.6087522!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5ea96272047%3A0xca9cfd325d12756a!2sMakam%20Keramat%20Empang%20Bogor!5e0!3m2!1sid!2sid!4v1716723947405!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Masjid Al Mustofa':
                    deskripsi = 'Masjid Al Mustofa adalah sebuah masjid bersejarah yang terletak di Bogor Utara. Selain menjadi tempat ibadah, masjid ini juga berperan sebagai pusat kegiatan keagamaan dan kegiatan sosial bagi masyarakat sekitar. Di sini, umat Islam berkumpul untuk melaksanakan ibadah, seperti salat lima waktu, kajian keagamaan, dan kegiatan sosial lainnya, yang memperkuat ikatan kebersamaan dan solidaritas di antara jamaah. Sebagai landmark penting di Bogor Utara, Masjid Al Mustofa juga menjadi tempat berkumpulnya masyarakat dalam berbagai aktivitas keagamaan dan sosial yang memperkaya kehidupan bermasyarakat dan beragama di wilayah tersebut.';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d507304.12031363905!2d106.4670004!3d-6.607919!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c519e3014ed5%3A0x8d380206d9dc5b!2sMasjid%20Al-Mustofa!5e0!3m2!1sid!2sid!4v1716723971947!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Makam "Keramat" Kuno':
                    deskripsi = 'Makam "Keramat" Kuno adalah sebuah tempat ziarah yang sangat penting bagi umat Islam di Bogor Utara. Tempat ini dianggap sakral dan sering dijadikan tempat untuk berdoa, memohon berkah, dan mengingat sejarah keagamaan. Para peziarah datang ke makam ini untuk mencari kedekatan spiritual dan mendapatkan keberkahan. Dengan nilai sejarah dan religius yang tinggi, Makam "Keramat" Kuno menjadi tempat yang dihormati dan dikunjungi oleh umat Islam dalam rangka meningkatkan spiritualitas dan mendapatkan barakah.';
                    imageSrc = '../foto/makamkeramatkuno.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31708.32528463322!2d106.7838589!3d-6.5795026!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5b5f702f495%3A0x756a5c489ed26fcd!2sMakam%20%22Keramat%22%20Kuno!5e0!3m2!1sid!2sid!4v1716723983417!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Masjid Raya Bogor':
                    deskripsi = 'Masjid Raya Bogor adalah sebuah masjid yang indah dan megah yang terletak di Bogor Timur. Selain menjadi tempat ibadah bagi umat Muslim, masjid ini juga menjadi pusat kegiatan keagamaan dan sosial bagi masyarakat sekitar. Di sini, umat Muslim berkumpul untuk menjalankan ibadah, seperti salat lima waktu, salat Jumat, dan berbagai kegiatan keagamaan lainnya. Selain itu, masjid ini juga menjadi tempat untuk menyelenggarakan kegiatan sosial, seperti pengajian, bakti sosial, dan kegiatan kemasyarakatan lainnya. Dengan arsitektur yang indah dan maknanya yang mendalam, Masjid Raya Bogor menjadi salah satu landmark penting di Bogor Timur yang selalu ramai dikunjungi oleh umat Muslim dan masyarakat sekitar.';
                    imageSrc = '../foto/masjid_rayabogor.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31706.556500255185!2d106.7885882!3d-6.6071549!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e77e193199%3A0x641aa7fe9c68d28c!2sMasjid%20Raya%20Bogor!5e0!3m2!1sid!2sid!4v1716723996471!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Masjid Agung Bogor':
                    deskripsi = 'Masjid Agung Bogor adalah sebuah masjid yang terkenal dan bersejarah yang terletak di Bogor Tengah. Selain menjadi pusat ibadah bagi umat Muslim, masjid ini juga menjadi pusat kegiatan keagamaan dan sosial bagi masyarakat sekitar. Di sini, umat Muslim berkumpul untuk melaksanakan ibadah, seperti salat lima waktu, salat Jumat, dan kegiatan keagamaan lainnya. Masjid Agung Bogor juga sering menjadi tempat untuk menyelenggarakan berbagai kegiatan sosial, seperti pengajian, bakti sosial, dan kegiatan kemasyarakatan lainnya. Dengan arsitektur yang megah dan sejarahnya yang kaya, Masjid Agung Bogor merupakan salah satu landmark penting di Bogor Tengah yang selalu ramai dikunjungi oleh umat Muslim dan masyarakat sekitar.';
                    imageSrc = '../foto/masjid_agungbogor.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.430082631941!2d106.79164569999999!3d-6.593346800000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5b6638f886b%3A0xa0790f704f7ca8ae!2sMasjid%20Agung%20Bogor!5e0!3m2!1sid!2sid!4v1716724008479!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Vihara Dharma Surya':
                    deskripsi = 'Vihara Dharma Surya adalah sebuah vihara yang indah dan tenang yang terletak di Bogor Tengah. Tempat ini merupakan tempat yang sering dijadikan sebagai tempat untuk bermeditasi dan mencari kedamaian bagi para pengunjungnya. Dengan atmosfer yang damai dan pemandangan yang menenangkan, Vihara Dharma Surya menyediakan lingkungan yang cocok untuk melatih pikiran dan mengembangkan spiritualitas. Para pengunjung dapat menghabiskan waktu di vihara ini untuk merenung, bermeditasi, atau sekadar menikmati ketenangan yang ditawarkan oleh lingkungan sekitarnya. Sebagai salah satu tempat ibadah penting di Bogor Tengah, Vihara Dharma Surya juga menjadi pusat kegiatan keagamaan dan sosial bagi komunitas Buddha di daerah tersebut.';
                    imageSrc = '../foto/vihara_dharma.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d507543.86369701615!2d106.3638928!3d-6.3699142!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e8181fb8d7%3A0x2fd086c103a839f!2sVihara%20Dharma%20Surya!5e0!3m2!1sid!2sid!4v1716724019220!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                case 'Gereja Katedral Bogor':
                    deskripsi = 'Gereja Katedral Bogor adalah sebuah gereja yang bersejarah dan megah yang terletak di Bogor Tengah. Tempat ini bukan hanya menjadi pusat kegiatan keagamaan, tetapi juga menjadi pusat kegiatan sosial bagi masyarakat sekitar. Dengan arsitektur yang menakjubkan dan nilai sejarah yang tinggi, Gereja Katedral Bogor menjadi landmark penting di Bogor yang sering dikunjungi oleh wisatawan dan umat Kristen dari berbagai tempat. Selain sebagai tempat ibadah, gereja ini juga menjadi tempat bagi berbagai kegiatan sosial, seperti pelayanan sosial bagi masyarakat yang membutuhkan, program bantuan bagi kaum rentan, dan berbagai kegiatan amal lainnya. Dengan demikian, Gereja Katedral Bogor tidak hanya menjadi tempat ibadah, tetapi juga menjadi simbol kasih dan pelayanan bagi masyarakat luas di Bogor Tengah.';
                    imageSrc = '../foto/gereja_katedral.jpg';
                    mapsLink = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.401521598179!2d106.7931299!3d-6.596917899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5b72f5b8d29%3A0xc126df0a0600c6d1!2sGereja%20Katedral%20Bogor%20St.%20Perawan%20Maria!5e0!3m2!1sid!2sid!4v1716724031399!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    break;
                default:
                    deskripsi = 'Deskripsi tentang tempat wisata ini belum tersedia.';
            }
            return `
                <div class="card">
                    <div class="card-body wisata-item">
                        <h2 class="card-title mx-auto" style="font-weight:bold">${wisata}</h2>
                        <p class="card-text" style="font-weight:normal">${deskripsi}</p>
                        <div class="d-flex wisata-content mx-auto">
                            <img src="${imageSrc}" alt="${wisata}" >
                            ${mapsLink}
                        </div>
                    </div>
                </div>

            `;
            
        }).join('');
        document.getElementById('btn-back').innerHTML = `<button onclick="window.location.href='wisata.php'" class="poppins" style="display: flex; justify-content: center;margin-top:20px;margin-bottom:-40px;margin-left:40px;border-radius:10px;background-color:#9290F5;color:white">
        BACK
         </button>`;
        document.getElementById('judul').innerHTML = `<h1 style="display:flex;justify-content:center;font-weight:bold">${formattedKategori} di ${formattedKecamatan}</h1>`;
        document.getElementById('detailWisata').innerHTML += detailWisata;
    </script>
</body>
</html>
