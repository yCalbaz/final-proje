<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Ol</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 250px;
            transition: width 0.3s ease;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        ul {
            color: #d9534f;
            padding: 0;
            list-style-type: none;
        }

        li {
            margin: 5px 0;
        }

        @media (max-width: 768px) {
            form {
                padding: 15px;
                max-width: 320px; 
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            button {
                font-size: 8px;
            }

            h1 {
                font-size: 20px;
            }

            .logo-container img {
                width: 120px;
            }
        }

        @media (max-width: 480px) {

            form {
                padding: 10px; /* Telefon için iç dolgu */
                max-width: 250px; /* Telefon için genişlik */
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            button {
                font-size: 6px; /* Telefon için yazı boyutu */
            }


            h1 {
                font-size: 20px;
            }

            button {
                padding: 6px;
            }

            .logo-container img {
                width: 100px;
            }
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <img src="assets/images/KayzeLogo.png" alt="KAYZE Logo">
    </div>
    <form action="<?= base_url('auth/register') ?>" method="post">
        <h1>Üye Ol</h1>

        <?php if (session()->getFlashdata('errors')): ?>
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

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
