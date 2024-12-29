<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ödeme</title>
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

<div class="container">
    <section class="checkout-section">
        <h1>Ödeme Sayfası</h1>

        <!-- Success Message -->
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message'); ?>
            </div>
        <?php endif; ?>

        <!-- Toplam Tutar -->
        <div class="total-amount">
            <h3>Ödenecek Toplam Tutar: <?= number_format($totalAmount, 2) ?> ₺</h3>
        </div>

        <!-- Ödeme Formu -->
        <form method="post" action="<?= base_url('checkout/submit'); ?>">
            <div class="form-group">
                <label for="fullname">Ad Soyad:</label>
                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Adınızı ve soyadınızı girin" required>
            </div>

            <div class="form-group">
                <label for="email">E-posta:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="E-posta adresinizi girin" required>
            </div>

            <div class="form-group">
                <label for="address">Adres:</label>
                <textarea id="address" name="address" class="form-control" placeholder="Adresinizi girin" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="payment_method">Ödeme Yöntemi:</label>
                <select id="payment_method" name="payment_method" class="form-control" required>
                    <option value="credit_card">Kredi Kartı</option>
                    <option value="bank_transfer">Banka Havalesi</option>
                    <option value="cash_on_delivery">Kapıda Ödeme</option>
                </select>
            </div>

            <div class="form-group">
                <label for="notes">Notlar (Opsiyonel):</label>
                <textarea id="notes" name="notes" class="form-control" placeholder="Sipariş ile ilgili özel notlarınızı yazabilirsiniz." rows="2"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Siparişi Tamamla</button>
            </div>
        </form>
    </section>
</div>

<?php include APPPATH . 'Views/tema/footer.php'; ?>

</body>
</html>
