<?php
session_start();
if (!isset($_SESSION['admin_giris'])) {
    header("Location: login.php");
    exit;
}
require 'baglan.php';

$sorgu = $db->query("SELECT * FROM urunler ORDER BY id DESC");
$urunler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ürünler - Yönetim Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Uygur Bilgisayar</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Anasayfa</a></li>
        <li class="nav-item"><a class="nav-link active" href="urunler.php">Ürün Yönetimi</a></li>
        <li class="nav-item"><a class="nav-link btn btn-danger text-white ms-2" href="cikis.php">Çıkış Yap</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Ürün Listesi</h2>
        <a href="urun_ekle.php" class="btn btn-success">Yeni Ürün Ekle</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Resim</th>
                <th>Ürün Adı</th>
                <th>Kategori</th>
                <th>Fiyat</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($urunler as $urun): ?>
            <tr>
                <td><?php echo $urun['id']; ?></td>
                <td>
                    <?php if($urun['resim']): ?>
                        <img src="../resimler/<?php echo $urun['resim']; ?>" width="50">
                    <?php else: ?>
                        Yok
                    <?php endif; ?>
                </td>
                <td><?php echo $urun['urun_adi']; ?></td>
                <td><?php echo isset($urun['kategori']) ? $urun['kategori'] : '-'; ?></td>
                <td><?php echo number_format($urun['fiyat'], 2); ?> TL</td>
                <td>
                    <a href="urun_duzenle.php?id=<?php echo $urun['id']; ?>" class="btn btn-primary btn-sm">Düzenle</a>
                    <a href="urun_sil.php?id=<?php echo $urun['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinize emin misiniz?');">Sil</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
