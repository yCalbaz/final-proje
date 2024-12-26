<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
</head>
<body>
    <h1>Giriş Yap</h1>

    <?php if (session()->get('error')): ?>
        <p style="color: red;"><?= session()->get('error'); ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= base_url('login'); ?>">
        <input type="text" name="username" placeholder="Kullanıcı Adı" required>
        <input type="password" name="password" placeholder="Şifre" required>
        <button type="submit">Giriş Yap</button>
    </form>
</body>
</html>
