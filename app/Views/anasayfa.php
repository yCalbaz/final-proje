<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KAYZfhngngvmödvklkmkkfvlkE</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="assets/css/anasayfa.css">
    
    <link rel="stylesheet" href="<?= base_url('css/responsive.css'); ?>"> 

    <!-- STYLES -->

   <!-- <style {csp-style-nonce}>
      

    </style>  -->
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<!-- HEADER: MENU + HEROE SECTION -->

<?php include('tema/header.php'); ?>


<!-- Slayt Gösterisi -->
<div class="slider-container">
        <div class="slider">
            <div class="slide fade">
                <img src="assets/images/1elektirik.jpg" alt="Slayt 1">
            </div>
            <div class="slide fade">
                <img src="assets/images/2elektirik.jpg" alt="Slayt 2">
            </div>
            <div class="slide fade">
                <img src="assets/images/3elektirik.jpg" alt="Slayt 3">
            </div>
            <div class="slide fade">
                <img src="assets/images/5elektirik.jpg" alt="Slayt 5">
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

<?php include('tema/footer.php'); ?>

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
