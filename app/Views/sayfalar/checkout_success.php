<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Başarılı</title>
    <!-- Bootstrap CSS Bağlantısı -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sayfa arka planı ve genel stil */
        body, html {
            height: 100%;
            background-color: #f8f9fa;
        }

        .success-page {
            background-color:rgba(9, 36, 240, 0.25); /* Mavi arka plan rengi */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .content {
            background-color: rgba(0, 0, 0, 0.6); /* Yarı saydam siyah arka plan */
            padding: 40px;
            border-radius: 100px;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .btn-primary {
            background-color:rgb(22, 17, 177);
            border-color: rgb(22, 17, 177);
        }

        .btn-primary:hover {
            background-color:rgb(19, 14, 150);
            border-color:rgb(19, 14, 150);
        }
    </style>
</head>
<body>
    <div class="success-page">
        <div class="content">
            <h1 class="display-4 fw-bold">Siparişiniz Onaylandı!</h1>
            <p class="lead">Bizi tercih ettiğiniz için teşekkür ederiz. Ödemenizi işleme alıyoruz.</p>
            <a href="/" class="btn btn-primary btn-lg">Anasayfaya Dön</a>
        </div>
    </div>

    <!-- Bootstrap JS Bağlantısı -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
