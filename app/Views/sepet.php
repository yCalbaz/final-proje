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

   
</head>
<body>

<!-- LOGO -->
<div class="logo-container">
    <img src="assets/images/elektirikLogo.jpg" alt="KAYZE Logo">
</div>

<!-- HEADER: MENU + HEROE SECTION -->

<?php include('tema/header.php'); ?>



<!-- SEPET BAŞLIK -->
<div class="container">
    <div class="cart-header">
        <h2>Sepetiniz</h2>
    </div>

    <!-- SEPET İÇERİĞİ -->
    <?php
    // Sepetteki ürünlerin örnek verileri
    $cartItems = [
        ["isim" => "Ürün 1", "fiyat" => 100, "resim" => "urun1.jpg", "adet" => 1],
        ["isim" => "Ürün 2", "fiyat" => 200, "resim" => "urun2.jpg", "adet" => 2],
    ];

    if (empty($cartItems)) {
        echo "<div class='empty-cart'>Sepetiniz boş.</div>";
    } else {
        echo "<table class='cart-items'>";
        echo "<tr><th>Ürün Resmi</th><th>Ürün Adı</th><th>Fiyat</th><th>Adet</th><th>Toplam</th><th>Aksiyon</th></tr>";

        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $itemTotal = $item['fiyat'] * $item['adet'];
            $totalPrice += $itemTotal;

            echo "<tr>
                    <td><img src='". base_url('assets/images/'.$item['resim']) ."' alt='{$item['isim']}'></td>
                    <td>{$item['isim']}</td>
                    <td>{$item['fiyat']} TL</td>
                    <td>{$item['adet']}</td>
                    <td>{$itemTotal} TL</td>
                    <td><a href='#' class='btn remove-btn'>Sil</a></td>
                  </tr>";
        }

        echo "</table>";

        echo "<div class='total'>Toplam Tutar: {$totalPrice} TL</div>";
    }
    ?>

    <div class="cart-actions">
        <a href="urunler.php" class="btn">Alışverişe Devam Et</a>
        <a href="odeme.php" class="btn">Ödeme Yap</a>
    </div>
</div>

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

</body>
</html>
