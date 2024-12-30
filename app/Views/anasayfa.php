<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KAYZE</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="assets/css/anasayfa.css">
    
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

        .slide {
            position: relative;
        }

        .slide-caption {
            position: absolute;
            top: 50%; /* Görselin ortasına yakın */
            left: 50%;
            transform: translate(-50%, -50%); /* Tam ortalama */
            background: linear-gradient(90deg,rgb(250, 250, 250),rgb(255, 255, 255)); /* Renk geçişli bir arka plan */
            -webkit-background-clip: text; /* Sadece yazıya uygulanmasını sağlar */
            -webkit-text-fill-color: transparent; /* Arka planı uygular, yazıyı şeffaf yapar */
            font-size: 3em; /* Büyük yazı boyutu */
            font-weight: bold; /* Kalın yazı */
            text-transform: uppercase; /* Tüm harfleri büyük yapar */
            text-shadow: 2px 2px 5px rgba(255, 255, 255, 0.64); /* Yazı gölgesi */
            text-align: center; /* Yazıyı ortalar */
            animation: pulse 2s infinite; /* Hafif nefes alma animasyonu */
        }

        /* Yazıya dikkat çekici bir nefes alma animasyonu */
        @keyframes pulse {
    0% {
        transform: translate(-50%, -50%) scale(1) translateY(0);
    }
    50% {
        transform: translate(-50%, -50%) scale(1.05) translateY(-10px); /* Yukarı hareket */
    }
    100% {
        transform: translate(-50%, -50%) scale(1) translateY(0); /* Geri dönüş */
    }
}


    </style>

</head>
<body>
<!-- LOGO -->
<div class="logo-container">
    <img src="assets/images/KayzeLogo.png" alt="KAYZE Logo">
</div>
<!-- HEADER: MENU + HEROE SECTION -->
<?php include('tema/header.php'); ?>




<!-- Slayt Gösterisi -->
<div class="slider-container" style="background-color: white; padding: 5px; border-radius: 10px;">
    <div class="slider">
        <div class="slide fade">
            <img src="assets/images/1elektirik.jpg" alt="Slayt 1">
            <div class="slide-caption"> Bahçe Aydınlatmaları</div>
        </div>
        <div class="slide fade">
            <img src="assets/images/2elektirik.jpg" alt="Slayt 2">
            <div class="slide-caption"> Kapalı Mekan Işıklandırma</div>
        </div>
        <div class="slide fade">
            <img src="assets/images/3elektirik.jpg" alt="Slayt 3">
            <div class="slide-caption"> En Yeni Led Teknolojiler</div>
        </div>
        <div class="slide fade">
            <img src="assets/images/5elektirik.jpg" alt="Slayt 5">
            <div class="slide-caption"> Güvenilir Hizmet</div>
        </div>
    </div>
</div>





<div class="container" style="background-color: white; padding: 5px; border-radius: 10px; margin-top: 20px;">
    <!-- Öne çıkan ürünler -->
    <div class="container">
        <h2>Öne Çıkan Ürünler</h2>

        <section class="product-section">
            <div id="product-list" class="product-list">
                <!-- Ürünler buraya eklenecek -->
            </div>
        </section>
    </div>
</div>

            <div class="products">
                <img src="assets/images/1.png" alt="Ürün 1">
  
            </div>




<!-- CONTENT -->


<!-- JavaScript -->
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let slides = document.getElementsByClassName("slide");

        // Tüm slaytları gizle
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 } // İlk slayta dön

        slides[slideIndex - 1].style.display = "block"; // Mevcut slaytı göster

        setTimeout(showSlides, 3000); // 3 saniye arayla geçiş
    }
</script>

<!-- JavaScript kodu -->
<script>
    fetch('/random-products') // Node.js API endpoint'i
        .then(response => response.json())
        .then(data => {
            const productList = document.getElementById('product-list');
            productList.innerHTML = ''; // Mevcut listeyi temizle

            data.products.forEach(product => {
                const productItem = document.createElement('div');
                productItem.classList.add('product-item');
                
                productItem.innerHTML = `
                    <img src="${product.image_url}" alt="${product.name}">
                    <h3>${product.name}</h3>
                    <p>${product.description}</p>
                    <p>${product.price}</p>
                `;

                productList.appendChild(productItem);
            });
        })
        .catch(error => console.error('Ürünler çekilirken hata oluştu:', error));
</script>

<div class="reklam-banner">
    <marquee behavior="scroll" direction="left">
        Büyük İndirim! Tüm ürünlerde %50'ye varan fırsatlar! Şimdi alışveriş yapın!Büyük İndirim! Tüm ürünlerde %50'ye varan fırsatlar! Şimdi alışveriş yapın!Büyük İndirim! Tüm ürünlerde %50'ye varan fırsatlar! Şimdi alışveriş yapın!Büyük İndirim! Tüm ürünlerde %50'ye varan fırsatlar! Şimdi alışveriş yapın!
    </marquee>
</div>



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

<!-- -->
<script src="assets/js/product-list.js"></script>
</body>
</html>
