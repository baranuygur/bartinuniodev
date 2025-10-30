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

        <div class="row">
            
            <div class="col-md-4 mb-4">
                <div class="card urunkart">
                    <img src="https://picsum.photos/400/300?random=1" class="card-img-top urunresim" alt="Bilgisayar">
                    <div class="card-body">
                        <h5 class="card-title urunbaslik">Dell Latitude E7470</h5>
                        <p class="urunozellik">Intel Core i5 6. Nesil</p>
                        <p class="urunozellik">8GB RAM - 256GB SSD</p>
                        <p class="urunfiyat">4.500 TL</p>
                        <a href="detay.php?id=1" class="btn dugme2">Detayları Gör</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card urunkart">
                    <img src="https://picsum.photos/400/300?random=2" class="card-img-top urunresim" alt="Bilgisayar">
                    <div class="card-body">
                        <h5 class="card-title urunbaslik">HP EliteBook 840 G3</h5>
                        <p class="urunozellik">Intel Core i7 6. Nesil</p>
                        <p class="urunozellik">16GB RAM - 512GB SSD</p>
                        <p class="urunfiyat">6.200 TL</p>
                        <a href="detay.php?id=2" class="btn dugme2">Detayları Gör</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card urunkart">
                    <img src="https://picsum.photos/400/300?random=3" class="card-img-top urunresim" alt="Bilgisayar">
                    <div class="card-body">
                        <h5 class="card-title urunbaslik">Lenovo ThinkPad T470</h5>
                        <p class="urunozellik">Intel Core i5 7. Nesil</p>
                        <p class="urunozellik">8GB RAM - 256GB SSD</p>
                        <p class="urunfiyat">5.100 TL</p>
                        <a href="detay.php?id=3" class="btn dugme2">Detayları Gör</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card urunkart">
                    <img src="https://picsum.photos/400/300?random=4" class="card-img-top urunresim" alt="Bilgisayar">
                    <div class="card-body">
                        <h5 class="card-title urunbaslik">Asus VivoBook 15</h5>
                        <p class="urunozellik">Intel Core i3 10. Nesil</p>
                        <p class="urunozellik">4GB RAM - 128GB SSD</p>
                        <p class="urunfiyat">3.800 TL</p>
                        <a href="detay.php?id=4" class="btn dugme2">Detayları Gör</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card urunkart">
                    <img src="https://picsum.photos/400/300?random=5" class="card-img-top urunresim" alt="Bilgisayar">
                    <div class="card-body">
                        <h5 class="card-title urunbaslik">Acer Aspire 5</h5>
                        <p class="urunozellik">AMD Ryzen 5</p>
                        <p class="urunozellik">8GB RAM - 512GB SSD</p>
                        <p class="urunfiyat">5.500 TL</p>
                        <a href="detay.php?id=5" class="btn dugme2">Detayları Gör</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card urunkart">
                    <img src="https://picsum.photos/400/300?random=6" class="card-img-top urunresim" alt="Bilgisayar">
                    <div class="card-body">
                        <h5 class="card-title urunbaslik">MSI GF63 Thin</h5>
                        <p class="urunozellik">Intel Core i7 9. Nesil</p>
                        <p class="urunozellik">16GB RAM - 512GB SSD - GTX 1650</p>
                        <p class="urunfiyat">9.800 TL</p>
                        <a href="detay.php?id=6" class="btn dugme2">Detayları Gör</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card urunkart">
                    <img src="https://picsum.photos/400/300?random=1" class="card-img-top urunresim" alt="Bilgisayar">
                    <div class="card-body">
                        <h5 class="card-title urunbaslik">Dell Inspiron 15</h5>
                        <p class="urunozellik">Intel Core i5 8. Nesil</p>
                        <p class="urunozellik">8GB RAM - 256GB SSD</p>
                        <p class="urunfiyat">4.900 TL</p>
                        <a href="detay.php?id=7" class="btn dugme2">Detayları Gör</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card urunkart">
                    <img src="https://picsum.photos/400/300?random=2" class="card-img-top urunresim" alt="Bilgisayar">
                    <div class="card-body">
                        <h5 class="card-title urunbaslik">HP Pavilion 14</h5>
                        <p class="urunozellik">Intel Core i3 11. Nesil</p>
                        <p class="urunozellik">8GB RAM - 256GB SSD</p>
                        <p class="urunfiyat">4.200 TL</p>
                        <a href="detay.php?id=8" class="btn dugme2">Detayları Gör</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card urunkart">
                    <img src="https://picsum.photos/400/300?random=3" class="card-img-top urunresim" alt="Bilgisayar">
                    <div class="card-body">
                        <h5 class="card-title urunbaslik">Lenovo IdeaPad 3</h5>
                        <p class="urunozellik">AMD Ryzen 3</p>
                        <p class="urunozellik">4GB RAM - 256GB SSD</p>
                        <p class="urunfiyat">3.500 TL</p>
                        <a href="detay.php?id=9" class="btn dugme2">Detayları Gör</a>
                    </div>
                </div>
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

