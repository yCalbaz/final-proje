<?php

session_start(); // Oturum başlatma

// CSRF token'ı oluşturun, eğer daha önce oluşturulmamışsa
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Güvenli bir token oluşturuluyor
}

// CSRF token doğrulama
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF attack detected!');
    }

    // Kullanıcı verilerini al
    $kulad = trim($_POST['kulad']);
    $sifre = trim($_POST['sifre']);
    $sifreTekrar = trim($_POST['sifre_tekrar']);
    $email = trim($_POST['email']);

    // Veritabanı bağlantısını başlat
    $conn = new mysqli($localhost, $root, "", $e_ticaret);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Kullanıcı adı kontrolü (veritabanında mevcut mu?)
    $sql = "SELECT * FROM users WHERE kulad = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kulad);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "Bu kullanıcı adı zaten alınmış.";
    } else {
        // Şifreyi doğrula
        if ($sifre !== $sifreTekrar) {
            echo "Şifreler eşleşmiyor!";
        } else {
            // Şifreyi güvenli bir şekilde hash'le
            $hashed_password = password_hash($sifre, PASSWORD_BCRYPT);

            // Kullanıcıyı veritabanına kaydet
            $sql = "INSERT INTO users (kulad, email, sifre) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $kulad, $email, $hashed_password);

            if ($stmt->execute()) {
                echo "Kayıt başarılı!";
            } else {
                echo "Hata oluştu: " . $conn->error;
            }
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- HTML Form -->
<form action="uye-ol.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

    <label for="kulad">Kullanıcı Adı:</label>
    <input type="text" name="kulad" required><br>

    <label for="email">E-posta:</label>
    <input type="email" name="email" required><br>

    <label for="sifre">Şifre:</label>
    <input type="password" name="sifre" required><br>

    <label for="sifre_tekrar">Şifre Tekrar:</label>
    <input type="password" name="sifre_tekrar" required><br>

    <input type="submit" value="Kayıt Ol">
</form>