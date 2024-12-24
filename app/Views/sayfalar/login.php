<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Sitem</title>
    <!-- Responsive CSS Dosyasını Dahil Et -->
    <link rel="stylesheet" href="<?= base_url('css/responsive.css'); ?>">
</head>
<body>
    <div class="container">
        <div class="login-screen">
            <div class="app-title">
                <h1>Giriş Yap</h1>
            </div>
            <div class="control-group">
                <input type="text" name="username" class="login-field" placeholder="=Kullanıcı Adı" id="login-name">
                <label class="login-field-icon fui-user" for="login-name"></label>

            </div>
            <div>
                <input type="possword" name="password" class="login-field" placeholder="Şifre" id="login-pass">
                <label class="login-field-icon fui-user" for="login-pass"></label>
            </div>
            <a href="login.php" class="btn btn-primary btn-large btn-block">Giriş Yap</a>
            <a href="uyeol.php" class="btn btn-primary btn-large btn-block">Kayıt Ol</a>
        </div>
    </div>
</body>
</html>
