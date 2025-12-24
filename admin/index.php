<?php
session_start();
if (!isset($_SESSION['admin_giris'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yönetim Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Uygur Bilgisayar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Anasayfa</a></li>
        <li class="nav-item"><a class="nav-link" href="urunler.php">Ürün Yönetimi</a></li>
        <li class="nav-item"><a class="nav-link btn btn-danger text-white ms-2" href="cikis.php">Çıkış Yap</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1>Hoşgeldiniz, <?php echo $_SESSION['kadi']; ?></h1>
            <p>Admin paneline başarıyla giriş yaptınız. Üst menüden ürün yönetimine gidebilirsiniz.</p>
            
            <div class="card mt-4">
                <div class="card-header">
                    Hızlı İşlemler
                </div>
                <div class="card-body">
                    <a href="urunler.php" class="btn btn-primary">Ürünleri Listele</a>
                    <a href="urun_ekle.php" class="btn btn-success">Yeni Ürün Ekle</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
