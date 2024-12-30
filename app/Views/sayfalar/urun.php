<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sepet</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="assets/css/anasayfa.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>">

        <style>

    /* Body'ye arka plan görseli eklemek */
    body {
    margin: 0;
    padding: 0;
    position: relative; /* Arka plan için konumlandırma */

    }

    /* Arka Plan Görselinin Saydamlık Ayarları */
    body::before {
    content: ""; /* İçerik boş olacak */
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('assets/images/adminarkaplan.jpg'); /* Arka plan görseli */
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;
    opacity: 0.2; /* Saydamlık oranını buradan ayarlayabilirsiniz */
    z-index: -1; /* İçeriğin önünde olmasını engeller */
    }


    .products {
    padding: 20px;
    text-align: center;
    }

    .products h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    }

    .product-list {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    }

    .product {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 250px;
    margin: 10px;
    text-align: center;
    }

    .product img {
    max-width: 100%;
    height: auto;
    margin-bottom: 15px;
    }

    .product h3 {
    font-size: 1.2rem;
    margin-bottom: 10px;
    }

    .product p {
    font-size: 1.5rem;
    color: #ff5733;
    margin-bottom: 15px;
    }

    .add-to-cart {
    background-color: #333;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    }





    </style>
</head>
<body>

<!-- LOGO -->
<div class="logo-container">
        <img src="assets/images/KayzeLogo.png" alt="KAYZE Logo">
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
    <h2>Ürünler</h2>
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