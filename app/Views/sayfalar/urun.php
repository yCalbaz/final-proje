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
// Veritabanı bağlantısı ve sorgu örneği
$connection = new mysqli('localhost', 'root', '', 'eticaret');

if ($connection->connect_error) {
    die("Bağlantı hatası: " . $connection->connect_error);
}

// Ürünleri veritabanından çekme
$sql = "SELECT * FROM products"; 
$result = $connection->query($sql);

$products = [];

if ($result->num_rows > 0) {
    // Veri var, ürünleri diziye ekle
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "Veri bulunamadı.";
}

$connection->close();
?>

<div class="container">
    <section class="product-section">
        <div class="product-list">
        <?php if (!empty($products)): ?>
    <?php foreach ($products as $product): ?>
        <div class="product-item">
            <img src="<?= base_url('resim/' . $product['resim']); ?>" alt="<?= esc($product['ad']); ?>">
            <h3><?= esc($product['ad']); ?></h3>
            <div class="details">
                <span>Marka: <?= esc($product['marka']); ?></span>
                <span>Fiyat: <?= esc($product['fiyat']); ?>₺</span>
            </div>

            <form action="<?= base_url('cart/add/' . $product['id']); ?>" method="post">
    <input type="hidden" name="product_id" value="<?= esc($product['id']); ?>">
    <input type="number" name="adet" value="1" min="1">
    <button type="submit">Sepete Ekle</button>
</form>
   </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Henüz ürün eklenmemiş.</p>
<?php endif; ?>

        </div>
    </section>
</div>


<?php include APPPATH . 'Views/tema/footer.php'; ?>


</body>
</html>