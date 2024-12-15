<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KAYZE</title>

    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="css/anasayfa.css">
    <link rel="stylesheet" href="<?= base_url('css/responsive.css'); ?>"> 

    <!-- STYLES -->

    <style {csp-style-nonce}>
        
        
/* Genel Stiller (Tüm cihazlar için geçerli) */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: auto;
}

/* Başlık ve Menü */
header {
    background-color: #007bff;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

header h1 {
    margin: 0;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 10px 0;
    display: flex;
    justify-content: center;
    gap: 15px;
}

nav ul li {
    margin: 0;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    padding: 8px 15px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

nav ul li a:hover {
    background-color: #0056b3;
}

/* Ürün Grid */
.product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
    justify-content: space-between;
}

.product {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
    padding: 15px;
    flex: 1 1 calc(25% - 20px); /* 4 sütun düzeni */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.product img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    border-radius: 5px;
}

.product h3 {
    font-size: 18px;
    margin: 10px 0;
}

.product p {
    font-size: 16px;
    color: #555;
}

.product .btn {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

.product .btn:hover {
    background-color: #0056b3;
}

/* Footer */
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    margin-top: 20px;
}

/* Mobil Uyumluluk */
@media (max-width: 768px) {
    nav ul {
        flex-direction: column; /* Menü alt alta gelsin */
        gap: 10px;
    }

    .product-grid {
        justify-content: center; /* Ürünler ortalansın */
    }

    .product {
        flex: 1 1 calc(50% - 20px); /* 2 sütun düzeni */
    }
}

@media (max-width: 480px) {
    .product {
        flex: 1 1 100%; /* Tek sütun düzeni */
    }

    nav ul li a {
        font-size: 14px;
        padding: 8px 10px;
    }
}

   

    /* Genel Stiller */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: auto;
}

/* Başlık ve Menü */
header {
    background-color: #007bff;
    color: #fff;
    padding: 10px 0;
}

header h1 {
    margin: 0;
    text-align: center;
}

nav ul {
    list-style: none;
    padding: 0;
    text-align: center;
}

nav ul li {
    display: inline;
    margin: 0 15px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

/* Ürün Grid */
.product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
    justify-content: space-between;
}

.product {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
    padding: 15px;
    flex: 1 1 calc(25% - 20px);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.product img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    border-radius: 5px;
}

.product h3 {
    font-size: 18px;
    margin: 10px 0;
}

.product p {
    font-size: 16px;
    color: #555;
}

.product .btn {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

.product .btn:hover {
    background-color: #0056b3;
}

/* Footer */
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    margin-top: 20px;
}

/* Menü Stili */
nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex; /* Flexbox kullanımı ile yatay hizalama */
    justify-content: center; /* Ortada hizalama */
    gap: 15px; /* Menü öğeleri arasına boşluk */
}

nav ul li {
    margin: 0;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    padding: 8px 15px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

nav ul li a:hover {
    background-color: #0056b3; /* Hover sırasında arka plan rengi */
}

/* Slider Genel Ayarları */
.slider-container {
    position: relative;
    max-width: 100%;
    margin: 0 auto;
    overflow: hidden;
}

.slider {
    display: flex;
    width: 500%;
    transition: transform 1s ease;
}

.slide {
    width: 100%;
    flex: 0 0 auto;
}

img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    display: block;
}

/* Slide Geçişi */
.fade {
    opacity: 0;
    animation: fadeIn 2s forwards;
}

@keyframes fadeIn {
    0% { opacity: 0; }
    100% { opacity: 1; }
}



    </style>
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>
    <div class="container">
        <h1>KAYZE</h1>
        <nav>
            <ul>
                <li><a href="index.php">Anasayfa</a></li>
                <li><a href="urunler.php">Ürünler</a></li>
                <li><a href="hakkimizda.php">Hakkımızda</a></li>
                <li><a href="iletisim.php">İletişim</a></li>
                <li><a href="sepet.php">Sepetim</a></li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('login'); ?>">Giriş</a>
                </li>

            </ul>
        </nav>
    </div>
</header>

<!-- Slayt Gösterisi -->
<div class="slider-container">
        <div class="slider">
            <div class="slide fade">
                <img src="images/e1elektirik.jpg" alt="Slayt 1">
            </div>
            <div class="slide fade">
                <img src="images/e2elektirik.jpg" alt="Slayt 2">
            </div>
            <div class="slide fade">
                <img src="images/e3elektirik.jpg" alt="Slayt 3">
            </div>
            <div class="slide fade">
                <img src="images/e4elektirik.jpg" alt="Slayt 4">
            </div>
            <div class="slide fade">
                <img src="images/e5elektirik.jpg" alt="Slayt 5">
            </div>
        </div>
</div>

<!-- JavaScript -->
<script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.getElementsByClassName("slide");

            // Tüm slaytları gizle
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 } // İlk slayta dön

            slides[slideIndex - 1].style.display = "block"; // Mevcut slaytı göster

            setTimeout(showSlides, 3000); // 3 saniye arayla geçiş
        }
</script>



<!-- CONTENT -->

<main>
        <div class="container">
            <h2>Öne Çıkan Ürünler</h2>
            <div class="product-grid">
                <?php
                // Örnek ürünler
                $urunler = [
                    ["isim" => "Ürün 1", "fiyat" => "100 TL", "resim" => "urun1.jpg"],
                    ["isim" => "Ürün 2", "fiyat" => "200 TL", "resim" => "urun2.jpg"],
                    ["isim" => "Ürün 3", "fiyat" => "300 TL", "resim" => "urun3.jpg"],
                    ["isim" => "Ürün 4", "fiyat" => "400 TL", "resim" => "urun4.jpg"],
                ];

                // Ürünleri döngü ile listeleme
                foreach ($urunler as $urun) {
                    echo "
                    <div class='product'>
                        <img src='images/{$urun['resim']}' alt='{$urun['isim']}'>
                        <h3>{$urun['isim']}</h3>
                        <p>Fiyat: {$urun['fiyat']}</p>
                        <a href='#' class='btn'>Sepete Ekle</a>
                    </div>
                    ";
                }
                ?>
            </div>
        </div>
    </main>



<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->



<!-- SCRIPTS -->

<script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- -->

</body>
</html>
