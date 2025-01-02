<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KAYZE</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="assets/css/anasayfa.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>">
     <style>

                /* Body'ye arka plan görseli eklemek */
        body {
            margin: 0;
            padding: 0;
            position: relative; /* Arka plan için konumlandırma */
         
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



<!-- Özellikler Bölümü -->
<section id="ozellikler" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Özellikler</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Hızlı Teslimat</h5>
                            <p class="card-text">Siparişleriniz en kısa sürede kapınızda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kaliteli Ürünler</h5>
                            <p class="card-text">Yüksek kalite standartlarında ürünler.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Müşteri Desteği</h5>
                            <p class="card-text">7/24 yanınızdayız.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <div>
    <img src="assets/images/1.png" alt="Ürün 1" class="img-fluid w-100">
</div>


            <section id="yorumlar" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Müşteri Yorumları</h2>
        <div class="row">
            <!-- Yorum 1 -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <p class="mb-2"><i class="bi bi-chat-quote-fill text-primary fs-2"></i></p>
                        <blockquote class="blockquote mb-0">
                            <p class="small">"Ürünler gerçekten çok kaliteli, tam zamanında geldi!"</p>
                        </blockquote>
                    </div>
                    <div class="card-footer bg-dark text-white text-center">
                        Ahmet Yılmaz
                    </div>
                </div>
            </div>
            <!-- Yorum 2 -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <p class="mb-2"><i class="bi bi-chat-quote-fill text-success fs-2"></i></p>
                        <blockquote class="blockquote mb-0">
                            <p class="small">"Müşteri hizmetleri çok ilgili, harika bir deneyim yaşadım."</p>
                        </blockquote>
                    </div>
                    <div class="card-footer bg-dark text-white text-center">
                        Zeynep Kaya
                    </div>
                </div>
            </div>
            <!-- Yorum 3 -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <p class="mb-2"><i class="bi bi-chat-quote-fill text-warning fs-2"></i></p>
                        <blockquote class="blockquote mb-0">
                            <p class="small">"Güvenilir bir site, ürünler sorunsuz teslim edildi."</p>
                        </blockquote>
                    </div>
                    <div class="card-footer bg-dark text-white text-center">
                        Mehmet Demir
                    </div>
                </div>
            </div>
            <!-- Yorum 4 -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <p class="mb-2"><i class="bi bi-chat-quote-fill text-danger fs-2"></i></p>
                        <blockquote class="blockquote mb-0">
                            <p class="small">"Ürün kalitesi mükemmel, herkese tavsiye ederim."</p>
                        </blockquote>
                    </div>
                    <div class="card-footer bg-dark text-white text-center">
                        Ayşe Çelik
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ekip Bölümü -->
<section id="ekip" class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4">Ekibimiz</h2>
        <div class="row">
            <div class="col-md-4">
                <img src="assets/images/zehra.jpg" class="rounded-circle mb-3" alt="Ekip Üyesi 1" style="width: 150px; height: 150px; object-fit: cover;">
                <h5>Zehra Sarıbaştanoğlu</h5>
                <p>Kurucu & CEO</p>
            </div>
            <div class="col-md-4">
                <img src="assets/images/kader.jpg" class="rounded-circle mb-3" alt="Ekip Üyesi 2" style="width: 150px; height: 150px; object-fit: cover;">
                <h5>Kader Demirdağ</h5>
                <p>Operasyon Müdürü</p>
            </div>
            <div class="col-md-4">
                <img src="assets/images/yase.jpg" class="rounded-circle mb-3" alt="Ekip Üyesi 3" style="width: 150px; height: 150px; object-fit: cover;">
                <h5>Yasemin Calbaz</h5>
                <p>Pazarlama Uzmanı</p>
            </div>
        </div>
    </div>
</section>





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
