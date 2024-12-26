<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KAYZE</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="assets/css/anasayfa.css">
    
    <link rel="stylesheet" href="<?= base_url('css/responsive.css'); ?>"> 

</head>
<body>
<!-- LOGO -->
<div class="logo-container">
    <img src="assets/images/elektirikLogo.jpg" alt="KAYZE Logo">
</div>
<!-- HEADER: MENU + HEROE SECTION -->
<?= view('tema/header') ?>





<body>

    <div class="container">
        <section>
            <h2>Hakkımızda</h2>
            <p>E-Ticaret Sitemiz, kaliteli ürünleri uygun fiyatlarla sunmayı hedefleyen bir platformdur. Müşteri memnuniyetine öncelik veriyoruz ve geniş ürün yelpazemizle ihtiyaçlarınıza en iyi şekilde cevap veriyoruz.</p>
        </section>

        <section>
            <h3>Ekibimiz</h3>
            <p>Ekibimiz, alanında uzman profesyonellerden oluşmaktadır ve her zaman en iyi hizmeti sunmak için çalışmaktadır.</p>
        </section>

        <section>
            <h3>Misyonumuz</h3>
            <p>Kalite: Her zaman en kaliteli ürünleri sunmak.
            <br>
            Güven: Güvenli ve sorunsuz bir alışveriş deneyimi sağlamak.
            <br>
            Müşteri Memnuniyeti: Müşteri taleplerini ve geri bildirimlerini dikkate alarak sürekli gelişmek.</p>
        </section>
    </div>



<!-- CONTENT -->


<!-- HEADER: MENU + HEROE SECTION -->
<?php include APPPATH . 'Views/tema/footer.php'; ?>


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
