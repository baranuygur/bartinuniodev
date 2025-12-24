<?php
require_once 'admin/baglan.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: urunler.php");
    exit;
}

$id = $_GET['id'];
$sorgu = $db->prepare("SELECT * FROM urunler WHERE id = ?");
$sorgu->execute([$id]);
$urun = $sorgu->fetch(PDO::FETCH_ASSOC);

if (!$urun) {
    header("Location: urunler.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $urun['urun_adi']; ?> - Uygur Bilgisayar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stil.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg ustmenu">
        <div class="container">
            <a class="navbar-brand baslik1" href="index.php">Uygur Bilgisayar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link menulink" href="index.php">Ana Sayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menulink" href="urunler.php">Ürünler</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <?php if($urun['resim']): ?>
                    <img src="resimler/<?php echo $urun['resim']; ?>" class="img-fluid rounded shadow" alt="<?php echo $urun['urun_adi']; ?>">
                <?php else: ?>
                    <img src="resimler/varsayilan.jpg" class="img-fluid rounded shadow" alt="Resim Yok">
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <h1 class="mb-3"><?php echo $urun['urun_adi']; ?></h1>
                <p class="text-muted mb-4">Kategori: <span class="badge bg-secondary"><?php echo isset($urun['kategori']) ? $urun['kategori'] : 'Genel'; ?></span></p>
                <div class="mb-4">
                    <h3 class="text-primary"><?php echo number_format($urun['fiyat'], 2); ?> TL</h3>
                </div>
                <div class="mb-4">
                    <h5>Ürün Açıklaması</h5>
                    <p><?php echo nl2br($urun['aciklama']); ?></p>
                </div>
                <a href="#" class="btn dugme1 btn-lg">Satın Al</a>
            </div>
        </div>
    </div>

    <footer class="altmenu mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="altbaslik">Uygur Bilgisayar</h5>
                    <p class="altyazi">Bilgisayar ve laptop satışında güvenilir adres</p>
                    <p class="altyazi">Bartın/Merkez Gölbucağı Mah. No:21</p>
                </div>
                <div class="col-md-6">
                    <h5 class="altbaslik">İletişim</h5>
                    <p class="altyazi">Tel: 0555 123 45 67</p>
                    <p class="altyazi">Email: info@uygurbilgisayar.com</p>
                </div>
            </div>
            <hr class="cizgi">
            <p class="text-center altyazi">© 2024 Uygur Bilgisayar - Tüm hakları saklıdır</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
