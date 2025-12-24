<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünler - Uygur Bilgisayar</title>
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
        <h2 class="baslik2 mb-4">Tüm Ürünler</h2>
        
        <div class="aramakutu">
            <div class="row">
                <div class="col-md-3">
                    <div class="filtre">
                        <label class="etiket">Marka</label>
                        <select class="girdi">
                            <option>Tümü</option>
                            <option>Dell</option>
                            <option>HP</option>
                            <option>Lenovo</option>
                            <option>Asus</option>
                            <option>Acer</option>
                            <option>MSI</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="filtre">
                        <label class="etiket">Fiyat Aralığı</label>
                        <select class="girdi">
                            <option>Tümü</option>
                            <option>0 - 4000 TL</option>
                            <option>4000 - 6000 TL</option>
                            <option>6000 - 8000 TL</option>
                            <option>8000 TL +</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="filtre">
                        <label class="etiket">RAM</label>
                        <select class="girdi">
                            <option>Tümü</option>
                            <option>4GB</option>
                            <option>8GB</option>
                            <option>16GB</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="filtre">
                        <label class="etiket">&nbsp;</label>
                        <button class="dugme3">Filtrele</button>
                    </div>
                </div>
            </div>
        </div>

<?php
require_once 'admin/baglan.php';
// Tüm ürünleri çek
$sorgu = $db->query("SELECT * FROM urunler");
$urunler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
?>
        <div class="row">
            
            <?php foreach($urunler as $urun): ?>
            <div class="col-md-4 mb-4">
                <div class="card urunkart">
                    <?php if($urun['resim']): ?>
                        <img src="resimler/<?php echo $urun['resim']; ?>" class="card-img-top urunresim" alt="<?php echo $urun['urun_adi']; ?>">
                    <?php else: ?>
                        <img src="resimler/varsayilan.jpg" class="card-img-top urunresim" alt="Resim Yok">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title urunbaslik"><?php echo $urun['urun_adi']; ?></h5>
                        <p class="urunozellik"><?php echo mb_strimwidth($urun['aciklama'], 0, 30, "..."); ?></p>
                        <p class="urunfiyat"><?php echo number_format($urun['fiyat'], 2); ?> TL</p>
                        <a href="detay.php?id=<?php echo $urun['id']; ?>" class="btn dugme2">Detayları Gör</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

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

