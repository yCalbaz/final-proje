<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
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
                font-size: 15px;
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
                font-size: 16px; /* Telefon için yazı boyutu */
            }


            h1 {
                font-size: 20px;
            }

            button {
                padding: 10px;
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
    <form method="POST" action="<?= base_url('login'); ?>">

        <h1>Giriş Yap</h1>

        <?php if (session()->get('error')): ?>
            <p><?= session()->get('error'); ?></p>
        <?php endif; ?>

        <input type="text" name="username" placeholder="Kullanıcı Adı" required>
        <input type="password" name="password" placeholder="Şifre" required>
        <button type="submit">Giriş Yap</button>
    </form>
</body>
</html>

