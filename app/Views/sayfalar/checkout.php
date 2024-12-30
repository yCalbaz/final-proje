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

    <style>

        /* Genel Stiller */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f7fc;
    color: #333;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

h1, h3 {
    text-align: center;
    font-weight: bold;
    color: #333;
}

h3 span {
    font-size: 1.2em;
    color: #007bff;
}

/* Başlık */
.section-title {
    font-size: 2em;
    margin-bottom: 30px;
    color: #007bff;
}

/* Form */
.checkout-form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 0 auto;
}

/* Form Alanları */
.form-group {
    margin-bottom: 20px;
}

label {
    font-size: 1.1em;
    font-weight: bold;
    color: #555;
    margin-bottom: 10px;
    display: block;
}

.form-control {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ddd;
    font-size: 1em;
    box-sizing: border-box;
}

.form-control:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Ödeme Yöntemi */
select.form-control {
    height: 40px;
}

/* Notlar */
textarea.form-control {
    resize: vertical;
}

/* Toplam Tutar */
.total-amount {
    margin-bottom: 30px;
    text-align: center;
}

.alert-success {
    padding: 15px;
    background-color: #28a745;
    color: #fff;
    border-radius: 4px;
    margin-bottom: 20px;
}

/* Submit Button */
.submit-button {
    text-align: center;
}

.btn {
    padding: 12px 25px;
    background-color: #007bff;
    color: #fff;
    font-size: 1.1em;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #0056b3;
}

.btn:focus {
    outline: none;
}

/* Responsive Tasarım */
@media (max-width: 768px) {
    .checkout-form {
        padding: 15px;
    }

    h1 {
        font-size: 1.8em;
    }

    .btn {
        padding: 10px 20px;
    }
}


    </style>
</head>
<body>

<!-- LOGO -->
    <div class="logo-container">
        <img src="assets/images/KayzeLogo.png" alt="KAYZE Logo">
    </div>

<?php include APPPATH . 'Views/tema/header.php'; ?>

<div class="container">
    <section class="checkout-section">
        <h1 class="section-title">Ödeme Sayfası</h1>

        <!-- Success Message -->
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message'); ?>
            </div>
        <?php endif; ?>

        <!-- Toplam Tutar -->
        <div class="total-amount">
            <h3>Ödenecek Toplam Tutar: <span><?= number_format($totalAmount, 2) ?> ₺</span></h3>
        </div>

        <!-- Ödeme Formu -->
        <form method="post" action="<?= base_url('checkout/submit'); ?>" class="checkout-form">
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

            <div class="form-group submit-button">
                <button type="submit" class="btn btn-primary">Siparişi Tamamla</button>
            </div>
        </form>
    </section>
</div>


<?php include APPPATH . 'Views/tema/footer.php'; ?>

</body>
</html>
