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
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- LOGO -->
<div class="logo-container text-center my-4">
    <img src="assets/images/KayzeLogo.png" alt="KAYZE Logo" class="img-fluid">
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

<!-- Center the cart section -->
<div class="container mt-5">
    <section class="product-section">
        <h1 class="text-center mb-4">Sepetiniz</h1>

        <!-- Success Message -->
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message'); ?>
            </div>
        <?php endif; ?>

        <div id="product-list" class="product-list">
            <?php if (!empty($cartItems)): ?>
                <form method="post" action="<?= base_url('cart/process'); ?>">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <thead class="thead-dark">
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
                                                 class="img-fluid" 
                                                 style="max-width: 100px;">
                                        </td>
                                        <td><?= esc($item['ad']); ?></td>
                                        <td><?= esc($item['marka']); ?></td>
                                        <td><?= esc($item['fiyat']); ?>₺</td>
                                        <td><?= esc($item['adet']); ?></td>
                                        <td><?= esc($item['fiyat'] * $item['adet']); ?>₺</td>
                                        <td>
                                            <!-- Sil Butonu -->
                                            <form method="post" action="<?= base_url('cart/removeFromCart/'.$item['cart_id']); ?>" style="display:inline;">
                                                <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Ödemeye Geç Butonu -->
                    <div class="text-right mt-4">
                        <a href="<?= base_url('checkout'); ?>" class="btn btn-primary btn-lg">Ödemeye Geç</a>
                    </div>
                </form>
            <?php else: ?>
                <p class="text-center">Sepetiniz boş.</p>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php include APPPATH . 'Views/tema/footer.php'; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
