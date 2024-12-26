<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ürünler</title>
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

<?php include APPPATH . 'Views/tema/header.php'; ?>

<div class="container">
<section class="product-section">
   
    <div id="product-list" class="product-list">
        <!-- Ürünler buraya eklenecek -->
    </div>
</section>
</div>



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
<?php include APPPATH . 'Views/tema/footer.php'; ?>

<!-- -->
<script src="assets/js/product-list.js"></script>
</body>
</html>
