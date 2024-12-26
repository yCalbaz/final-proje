


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamburger Menü</title>
    <style>
        /* Genel Ayarlar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Sağ kayma önlenir */
        }

        .btnust-login,
        .btnust-signup {
            position: fixed;
            top: 10px;
            font-size: 14px;
            padding: 8px 12px;
            background-color: #007BFF; /* Mavi arka plan */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            z-index: 1002;
            display: none; /* Sadece tablet/telefon için görünür */
            margin-top: 28px;
        }

        /* İkinci buton biraz sağda görünsün */
        .btnust-signup {
            left: 130px; /* Sağ tarafa yerleştir */
            background-color: #007BFF;
        }

        .btnust-login:hover, .btnust-signup:hover {
            background-color:rgb(21, 37, 130);
        }

        /* Tablet ve Telefon Boyutunda Görünürlük */
        @media (max-width: 1100px) {
            .btnust-login,
            .btnust-signup {
                display: inline-block; /* Yan yana olsun */
                position: fixed;
                top: 10px;
            }

            .btnust-login {
                left: 10px; /* İlk buton solda */
            }

            .btnust-signup {
                left: 110px; /* İkinci buton biraz sağda */
            }
        }


        /* Hamburger Menü Butonu */
        
                .hamburger-menu {
            font-size: 32px; /* Daha büyük boyut */
            background: none;
            border: none;
            cursor: pointer;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1001; /* Hamburger iconunun z-indexi */
            padding: 10px; /* Daha geniş tıklama alanı */
            width: 50px; /* Buton genişliği */
            height: 50px; /* Buton yüksekliği */
            color: #007BFF; /* Mavi renk */
            display: none; /* Masaüstünde gizli */
}
        /* Sadece Tablet ve Telefon Boyutunda Görünür */
        @media (max-width: 1100px) {
            .hamburger-menu {
                display: block; /* Görünür yap */
            }
        }


        /* Menü Stili */
        .menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 75%;
            max-width: 300px;
            height: auto; /* Yüksekliği otomatik yap */
            max-height: 300px; /* Maksimum yükseklik */
            background-color: #222;
            color: white;
            box-shadow: -4px 0 10px rgba(0, 0, 0, 0.5);
            transition: right 0.3s ease;
            z-index: 1002;
            padding: 20px;
            overflow-y: auto; /* Menü elemanları çoksa kaydırma çubuğu ekler */
        }

        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .menu li {
            margin: 10px 0; /* Elemanlar arasındaki boşluğu azalt */
        }

        .menu a {
            text-decoration: none;
            color: white;
            font-size: 16px; /* Yazı boyutunu biraz küçült */
            display: block;
        }


        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }

        /* Sadece Tablet ve Telefon Boyutunda Görünür */
        @media (max-width: 1100px) {
            .hamburger-menu {
                display: block;
            }
        }
    </style>
</head>
<body>
    
<header class="menukaybol">
<div class="container">
        <nav>
            <ul>
                <li><a href="<?=site_url()?>">Anasayfa</a></li>
                <li><a href="<?=site_url("urun")?>">Ürünler</a></li>
                <li><a href="<?=site_url("hakkimizda")?>">Hakkımızda</a></li>
                <li><a href="<?=site_url("iletisim")?>">İletişim</a></li>
                <li><a href="<?=site_url("sepet")?>">Sepetim</a></li>
                <li><a href="<?=site_url("login")?>" class="btn-login">Giriş Yap</a></li>
                <li><a href="<?=site_url("uyeol")?>" class="btn-signup">Üye Ol</a></li>
            </ul>
        </nav>
    </div>
    
</header>
<a href="<?=site_url("login")?>" class="btnust-login">Giriş Yap</a>
<a href="<?=site_url("uyeol")?>" class="btnust-signup">Üye Ol</a>

    <!-- Hamburger Menü Butonu -->
    <button id="menu-toggle" class="hamburger-menu">☰</button>

    <!-- Hamburger Menü -->
    <nav id="side-menu" class="menu">
        
        <button id="close-menu" class="close-btn">✖</button>
        <ul>
                <li><a href="<?=site_url()?>">Anasayfa</a></li>
                <li><a href="<?=site_url("urun")?>">Ürünler</a></li>
                <li><a href="<?=site_url("hakkimizda")?>">Hakkımızda</a></li>
                <li><a href="<?=site_url("iletisim")?>">İletişim</a></li>
                <li><a href="<?=site_url("sepet")?>">Sepetim</a></li>
                
        </ul>
    </nav>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const menuToggle = document.getElementById("menu-toggle");
            const sideMenu = document.getElementById("side-menu");
            const closeMenu = document.getElementById("close-menu");

            // Menü açma
            menuToggle.addEventListener("click", () => {
                sideMenu.style.right = "0";
            });

            // Menü kapatma
            closeMenu.addEventListener("click", () => {
                sideMenu.style.right = "-100%";
            });
        });
    </script>
</body>
</html>