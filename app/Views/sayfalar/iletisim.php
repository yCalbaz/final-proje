<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KAYZfhngngvmödvklkmkkfvlkE</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="assets/css/anasayfa.css">
    <link rel="stylesheet" href="<?= base_url('css/responsive.css'); ?>">
</head>
<body>

<!-- LOGO -->
    <div class="logo-container">
        <img src="assets/images/KayzeLogo.png" alt="KAYZE Logo">
    </div>

<?php include APPPATH . 'Views/tema/header.php'; ?>


    <!-- Main Content -->
    <main>
        <section class="contact-section">
            <div class="container">
                <h1>Bizimle İletişime Geçin</h1>

                <!-- İletişim Bilgileri -->
                <div class="contact-info">
                    <h2>İletişim Bilgilerimiz</h2>
                    <ul>
                        <li><strong>Telefon:</strong> 0123 456 789</li>
                        <li><strong>Email:</strong> info@eticaret.com</li>
                        <li><strong>Adres:</strong> Örnek Mah. No:123, İstanbul, Türkiye</li>
                    </ul>
                </div>

                <!-- İletişim Formu -->
                <div class="contact-form">
                    <h2>Mesaj Gönderin</h2>
                    <form action="send_message.php" method="POST">
                        <label for="name">Adınız</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Email Adresiniz</label>
                        <input type="email" id="email" name="email" required>

                        <label for="message">Mesajınız</label>
                        <textarea id="message" name="message" rows="5" required></textarea>

                        <button type="submit" class="btn">Gönder</button>
                    </form>
                </div>

            
            </div>
        </section>
    </main>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<?php include APPPATH . 'Views/tema/footer.php'; ?>

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

</body>
</html>
