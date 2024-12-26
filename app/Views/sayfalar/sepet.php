<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sepet</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('assets/css/anasayfa.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/responsive.css'); ?>">
</head>
<body>

<!-- LOGO -->
<div class="logo-container">
    <img src="<?= base_url('assets/images/elektirikLogo.jpg'); ?>" alt="Logo">
</div>

<!-- HEADER -->
<?php include APPPATH . 'Views/tema/header.php'; ?>

<!-- SEPET BAŞLIK -->
<div class="container">
    <div class="cart-header">
        <h2>Sepetiniz</h2>
    </div>

    <!-- SEPET İÇERİĞİ -->
    <?php if (!empty($cartItems)): ?>
        <table class="cart-items">
            <thead>
                <tr>
                    <th>Ürün Resmi</th>
                    <th>Ürün Adı</th>
                    <th>Fiyat</th>
                    <th>Adet</th>
                    <th>Toplam</th>
                    <th>Aksiyon</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalPrice = 0; ?>
                <?php foreach ($cartItems as $item): ?>
                    <?php $itemTotal = $item['price'] * $item['quantity']; ?>
                    <tr>
                        <<td><img src="<?= base_url('assets/images/'.$item['product_id'].'.jpg'); ?>" alt="<?= esc($item['product_name']); ?>"></td>
                        <td><?= esc($item['product_name']); ?></td>
                        <td><?= esc($item['price']); ?> TL</td>
                        <td><?= esc($item['quantity']); ?></td>
                        <td><?= esc($itemTotal); ?> TL</td>
                        <td><a href="<?= base_url('/cart/remove/'.$item['id']); ?>" class="btn remove-btn">Sil</a></td>
                    </tr>
                    <?php $totalPrice += $itemTotal; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="total">
            Toplam Tutar: <?= $totalPrice; ?> TL
        </div>
    <?php else: ?>
        <div class="empty-cart">Sepetiniz boş.</div>
    <?php endif; ?>

    <div class="cart-actions">
        <a href="<?= base_url('/urunler'); ?>" class="btn">Alışverişe Devam Et</a>
        <a href="<?= base_url('/odeme'); ?>" class="btn">Ödeme Yap</a>
    </div>
</div>

<!-- FOOTER -->
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

</body>
</html>
