<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KAYZE</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="assets/css/anasayfa.css">
    
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>"> 

</head>
<body>
<!-- LOGO -->
<div class="logo-container">
    <img src="assets/images/elektirikLogo.jpg" alt="KAYZE Logo">
</div>
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


        
            <h2>Öne Çıkan Ürünler</h2>

            
<section class="product-section">
   
   <div id="product-list" class="product-list">
       <!-- Ürünler buraya eklenecek -->
   </div>
</section>
 



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
<script src="assets/js/product-list.js"></script>
</body>
</html>
