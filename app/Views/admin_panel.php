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
        <h2>Ürün Ekleme</h2>
        <form id="product-form" enctype="multipart/form-data" method="POST" action="http://localhost:3000/urun">
            <input type="text" id="id" name="id" placeholder="Ürün ID" required>
            <input type="text" id="ad" name="ad" placeholder="Ürün Adı" required>
            <input type="text" id="marka" name="marka" placeholder="Ürün Marka" required>
            <input type="text" id="adet" name="adet" placeholder="Ürün Adet" required>
            <input type="text" id="fiyat" name="fiyat" placeholder="Ürün Fiyatı" required>
            <input type="file" id="resim" name="resim" required>
            <button type="submit">Ürün Ekle</button>
        </form>

        <!-- Ürün Listesi -->
        <h2>Ürün Güncelleme ve Silme</h2>
        <table class="table">
            <thead>
                
            </thead>
            <tbody id="product-list">
                <!-- Ürünler buraya eklenecek -->
            </tbody>
        </table>

        <!-- Güncelleme Modal'ı -->
        <div id="update-modal" style="display: none;">
            <form id="update-form">
                <input type="hidden" id="update-id">
                <input type="text" id="update-ad" placeholder="Ürün Adı" required>
                <input type="text" id="update-marka" placeholder="Ürün Marka" required>
                <input type="text" id="update-adet" placeholder="Ürün Adet" required>
                <input type="number" id="update-fiyat" placeholder="Ürün Fiyatı" required>
                <button type="submit">Güncelle</button>
                <button type="button" onclick="closeUpdateModal()">Kapat</button>
            </form>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
    
</body>
</html>
