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
        <h1>Ürün Yönetimi</h1>

        <!-- Ürün Ekleme Formu -->
        <form id="product-form" enctype="multipart/form-data" method="POST" action="http://localhost:3000/urun">
            <input type="text" id="id" name="id" placeholder="Ürün ID" required>
            <input type="text" id="ad" name="ad" placeholder="Ürün Adı" required>
            <input type="text" id="marka" name="marka" placeholder="Ürün Marka" required>
            <input type="text" id="adet" name="adet" placeholder="Ürün Adet" required>
            <input type="text" id="fiyat" name="fiyat" placeholder="Ürün Fiyatı" required>
            <input type="file" id="resim" name="resim" required>
            <button type="submit">Ürün Ekle</button>
        </form>

        <!-- Ürün Güncelleme Formu -->
        <h2>Ürün Güncelleme</h2>
        <form id="update-form"  method="PATCH" action="http://localhost:3000//urun/:id">
            <input type="text" id="update-id" name="id" placeholder="Ürün ID" required>
            <input type="text" id="update-ad" name="ad" placeholder="Yeni Ürün Adı">
            <input type="text" id="update-marka" name="marka" placeholder="Yeni Ürün Marka">
            <input type="text" id="update-adet" name="adet" placeholder="Yeni Ürün Adet">
            <input type="text" id="update-fiyat" name="fiyat" placeholder="Yeni Ürün Fiyatı">
            <button type="submit">Ürün Güncelle</button>
        </form>

        <!-- Ürün Silme Formu -->
        <h2>Ürün Silme</h2>
        <form id="delete-form" method="DELETE" action="http://localhost:3000//urun/:id" >
            <input type="text" id="delete-id" name="id" placeholder="Ürün ID" required>
            <button type="submit">Ürün Sil</button>
        </form>

        <!-- Ürün Listeleme Butonu ve Listesi -->
        <h2>Ürün Listesi</h2>
        <button id="list-products" action="http://localhost:3000//urun">Ürünleri Listele</button>
        <div id="product-list"></div>
        <img src="http://localhost:3000/uploads/1234567890-resim.jpg" alt="Ürün Resmi">

    </div>
    <script src="<?php echo base_url('public/assets/js/script.js'); ?>"></script>
</body>
</html>
