<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Ol</title>
</head>
<body>
    <h1>Üye Ol</h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

   <form action="<?= base_url('auth/register') ?>" method="post">
    <?= csrf_field() ?>
        <div>
            <label for="username">Kullanıcı Adı</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="email">E-posta</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Şifre</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Kayıt Ol</button>
    </form>
</body>
</html>
