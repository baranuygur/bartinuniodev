<?php
session_start();
require 'baglan.php';

if (isset($_POST['giris'])) {
    $kadi = $_POST['kadi'];
    $sifre = md5($_POST['sifre']);

    if ($kadi && $sifre) {
        $sorgu = $db->prepare("SELECT * FROM yoneticiler WHERE kullanici_adi = :k AND sifre = :s");
        $sorgu->execute([':k' => $kadi, ':s' => $sifre]);
        $sayi = $sorgu->rowCount();

        if ($sayi > 0) {
            $_SESSION['admin_giris'] = true;
            $_SESSION['kadi'] = $kadi;
            header("Location: index.php");
            exit;
        } else {
            $hata = "Kullanıcı adı veya şifre hatalı!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uygur Bilgisayar - Yönetici Girişi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .login-box { max-width: 400px; margin: 100px auto; padding: 20px; background: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="container">
    <div class="login-box">
        <h3 class="text-center mb-4">Uygur Bilgisayar Yönetim</h3>
        <?php if(isset($hata)): ?>
            <div class="alert alert-danger"><?php echo $hata; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label>Kullanıcı Adı</label>
                <input type="text" name="kadi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Şifre</label>
                <input type="password" name="sifre" class="form-control" required>
            </div>
            <button type="submit" name="giris" class="btn btn-primary w-100">Giriş Yap</button>
        </form>
    </div>
</div>

</body>
</html>

