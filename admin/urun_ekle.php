<?php
session_start();
if (!isset($_SESSION['admin_giris'])) {
    header("Location: login.php");
    exit;
}
require 'baglan.php';

if (isset($_POST['kaydet'])) {
    $adi = $_POST['urun_adi'];
    $aciklama = $_POST['aciklama'];
    $fiyat = $_POST['fiyat'];
    $kategori = $_POST['kategori'];
    $resimAdi = "";

    if ($_FILES['resim']['name']) {
        $hedefKlasor = "../resimler/";
        $dosyaIsmi = time() . "_" . basename($_FILES["resim"]["name"]);
        $hedefDosya = $hedefKlasor . $dosyaIsmi;
        
        if (move_uploaded_file($_FILES["resim"]["tmp_name"], $hedefDosya)) {
            $resimAdi = $dosyaIsmi;
        }
    }

    $sorgu = $db->prepare("INSERT INTO urunler (urun_adi, aciklama, fiyat, resim, kategori) VALUES (?, ?, ?, ?, ?)");
    $ekle = $sorgu->execute([$adi, $aciklama, $fiyat, $resimAdi, $kategori]);

    if ($ekle) {
        header("Location: urunler.php");
        exit;
    } else {
        $hata = "Ekleme sırasında bir sorun oluştu.";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ürün Ekle - Yönetim Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Uygur Bilgisayar</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="urunler.php">Geri Dön</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Yeni Ürün Ekle</div>
                <div class="card-body">
                    <?php if(isset($hata)) { echo '<div class="alert alert-danger">'.$hata.'</div>'; } ?>
                    
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label>Ürün Adı</label>
                            <input type="text" name="urun_adi" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control">
                                <option value="Okul">Okul</option>
                                <option value="Ofis">Ofis</option>
                                <option value="Oyun">Oyun</option>
                                <option value="Kreatif">Kreatif</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Açıklama</label>
                            <textarea name="aciklama" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Fiyat (TL)</label>
                            <input type="number" step="0.01" name="fiyat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Resim Yükle</label>
                            <input type="file" name="resim" class="form-control">
                        </div>
                        <button type="submit" name="kaydet" class="btn btn-success">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
