<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Paneli</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
</head>
<body>
    <div class="container">
        <h1>Yönetici Paneli</h1>
        <!-- Ürün Ekleme Formu -->
        <h2>Ürün Silme</h2>
        <form id="product-form">
            <input type="text" id="id" placeholder="Ürün ID" required>
            <input type="text" id="ad" placeholder="Ürün Adı" required>
            <input type="text" id="marka" placeholder="Ürün Marka" required>
            <input type="text" id="adet" placeholder="Ürün Adet" required>
            <button type="submit">Ürün Ekle</button>
        </form>

        <!-- Ürün Güncelleme Formu -->
        <h2>Ürün Güncelleme</h2>
        <form id="update-form">
            <input type="text" id="update-id" placeholder="Ürün ID" required>
            <input type="text" id="update-ad" placeholder="Yeni Ürün Adı">
            <input type="text" id="update-marka" placeholder="Yeni Ürün Marka">
            <input type="text" id="update-adet" placeholder="Yeni Ürün Adet">
            <button type="submit">Ürün Güncelle</button>
        </form>

        <!-- Ürün Silme Formu -->
        <h2>Ürün Silme</h2>
        <form id="delete-form">
            <input type="text" id="delete-id" placeholder="Ürün ID" required>
            <button type="submit">Ürün Sil</button>
        </form>
        <!-- Ürün Listesi --> 
        <h2>Ürün Listesi</h2> 
        <button id="list-products">Ürünleri Listele</button> 
        <div id="product-list"></div>
        
    </div>
    <script src="<?php echo base_url('public/assets/js/script.js'); ?>"></script>
</body>
</html>
