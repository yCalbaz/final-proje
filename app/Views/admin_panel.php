<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Sayfanın tamamını kaplayan arka plan fotoğrafı */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('assets/images/adminarkaplan.jpg'); /* Fotoğrafı burada belirleyin */
            background-size: cover;
            background-position: center;
            opacity: 0.2; /* Opasiteyi ayarlayın */
            z-index: -1; /* Fotoğrafın içeriklerin arkasında olmasını sağla */
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        button {
            display: inline-block;
            margin: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }


        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        form {
            margin-bottom: 30px;
            display: grid;
            gap: 10px;
        }

        form input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }

        form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #007bff;
        }

        #product-list {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* Her satırda 5 ürün */
            column-gap: 20px; /* Sütunlar arasındaki boşluk */
            row-gap: 10%; /* Satırlar arasındaki boşluk */
            justify-content: center; /* Ortala */
            max-height: 600px; /* Maksimum yükseklik belirleyin */
            overflow-y: auto; /* Yatayda taşma durumunda kaydırma çubuğu ekleyin */
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 10px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }


        .product-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%; /* Ürün kartlarının aynı boyutta olmasını sağlar */
        }

        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .product-item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .product-item h3 {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 10px;
        }

        .product-item p {
            color: #555;
            font-size: 1em;
            margin: 10px 0;
        }

        .product-item button {
            padding: 5px 10px;
            margin: 5px 0;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            font-size: 14px;
        }

        .product-item button:nth-child(4) {
            background-color: #dc3545;
        }

        .product-item button:hover {
            background-color: #0056b3;
        }




        /* Logo */
        .logo-container {
            text-align: center;
            margin-bottom: -70px; /* Margin bottom'u kısaltıldı */
            padding: 10px;
        }

        .logo-container img {
            width: 250px;
            transition: width 0.3s ease;
        }

        .form-control {
            border-radius: 8px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }

        button {
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #007BFF;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .modal-content {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background-color: #007BFF;
            color: white;
        }

        .modal-footer {
            text-align: center;
        }

        .top-right-button {
            position: absolute;
            top: 10px; /* Üstten mesafe */
            right: 10px; /* Sağdan mesafe */
            padding: 10px 20px;
            background-color: #007bff; /* Buton rengi */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            z-index: 10; /* Arka plan fotoğrafının önünde olması için */
        }

        .top-right-button:hover {
            background-color: #0056b3; /* Hover efekti */
        }


    </style>
</head>
<body>

<!-- Logo Ekleme -->
<div class="logo-container">
    <img src="assets/images/KayzeLogo.png" alt="KAYZE Logo">
</div>

<div class="container">
<button class="top-right-button" onclick="window.location.href='<?php echo base_url('anasayfa'); ?>';">Çıkış</button>



    <h1>Yönetici Paneli</h1>

    <!-- Ürün Ekleme Formu -->
    <h2>Ürün Ekleme</h2>
    <form id="product-form" enctype="multipart/form-data" method="POST" action="http://localhost:3000/urun">
        <div class="mb-3">
            <label for="id" class="form-label">Ürün ID</label>
            <input type="text" class="form-control" id="id" name="id" placeholder="Ürün ID" required>
        </div>
        <div class="mb-3">
            <label for="ad" class="form-label">Ürün Adı</label>
            <input type="text" class="form-control" id="ad" name="ad" placeholder="Ürün Adı" required>
        </div>
        <div class="mb-3">
            <label for="marka" class="form-label">Ürün Marka</label>
            <input type="text" class="form-control" id="marka" name="marka" placeholder="Ürün Marka" required>
        </div>
        <div class="mb-3">
            <label for="adet" class="form-label">Ürün Adet</label>
            <input type="text" class="form-control" id="adet" name="adet" placeholder="Ürün Adet" required>
        </div>
        <div class="mb-3">
            <label for="fiyat" class="form-label">Ürün Fiyatı</label>
            <input type="text" class="form-control" id="fiyat" name="fiyat" placeholder="Ürün Fiyatı" required>
        </div>
        <div class="mb-3">
            <label for="resim" class="form-label">Ürün Resmi</label>
            <input type="file" class="form-control" id="resim" name="resim" required>
        </div>
        <button type="submit" class="btn btn-primary">Ürün Ekle</button>
    </form>

    <!-- Ürün Listesi -->
    <h2 class="mt-5">Ürün Güncelleme ve Silme</h2>
    <div id="product-list" class="product-list"> 
        <!-- Ürünler burada listelenecek -->
        </div>
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
        <!-- Diğer ürünler burada olacak -->
   
        <a href="<?= base_url('/logout'); ?>" class="btn btn-danger">Çıkış Yap</a>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
</body>
</html>
