<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sepet</title>
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

<?php
// Veritabanı bağlantısı ve sorgu
$connection = new mysqli('localhost', 'root', '', 'eticaret');

if ($connection->connect_error) {
    die("Bağlantı hatası: " . $connection->connect_error);
}

// `cart` ve `product` tablolarını birleştirerek ürün detaylarını çekme
$sql = "SELECT 
            cart.id as cart_id,
            cart.adet, 
            products.id as product_id, 
            products.ad, 
            products.marka, 
            products.fiyat, 
            products.resim 
        FROM cart 
        JOIN products ON cart.product_id = products.id";

$result = $connection->query($sql);

$cartItems = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }
} else {
    echo "Sepetiniz boş.";
}

$connection->close();
?>

<div class="container">
    <section class="product-section">
        <h1>Sepet</h1>

        <!-- Success Message -->
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message'); ?>
            </div>
        <?php endif; ?>

        <div id="product-list" class="product-list">
            <?php if (!empty($cartItems)): ?>
                <form method="post" action="<?= base_url('cart/process'); ?>">
                    <table border="1" style="width: 100%; text-align: center;">
                        <thead>
                            <tr>
                                <th>Ürün Resmi</th>
                                <th>Ürün Adı</th>
                                <th>Marka</th>
                                <th>Fiyat</th>
                                <th>Adet</th>
                                <th>Toplam Fiyat</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td>
                                        <img src="<?= base_url('resim/' . $item['resim']); ?>" 
                                             alt="<?= esc($item['ad']); ?>" 
                                             width="100">
                                    </td>
                                    <td><?= esc($item['ad']); ?></td>
                                    <td><?= esc($item['marka']); ?></td>
                                    <td><?= esc($item['fiyat']); ?>₺</td>
                                    <td><?= esc($item['adet']); ?></td>
                                    <td><?= esc($item['fiyat'] * $item['adet']); ?>₺</td>
                                    <td>
                                        <!-- Sil Butonu -->
                                        <form method="post" action="<?= base_url('cart/removeFromCart/'.$item['cart_id']); ?>" style="display:inline;">
                                            <button type="submit" class="btn btn-danger">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Ödemeye Geç Butonu -->
                    <div style="margin-top: 20px; text-align: right;">
                        <a href="<?= base_url('checkout'); ?>" class="btn btn-primary">Ödemeye Geç</a>
                    </div>
                </form>
            <?php else: ?>
                <p>Sepetiniz boş.</p>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php include APPPATH . 'Views/tema/footer.php'; ?>

</body>
</html>
