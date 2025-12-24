<?php
session_start();
if (!isset($_SESSION['admin_giris'])) {
    header("Location: login.php");
    exit;
}
require 'baglan.php';

$id = $_GET['id'];
$sorgu = $db->prepare("SELECT * FROM urunler WHERE id = ?");
$sorgu->execute([$id]);
$urun = $sorgu->fetch(PDO::FETCH_ASSOC);

if (!$urun) {
    header("Location: urunler.php");
    exit;
}

if (isset($_POST['guncelle'])) {
    $adi = $_POST['urun_adi'];
    $aciklama = $_POST['aciklama'];
    $fiyat = $_POST['fiyat'];
    $kategori = $_POST['kategori'];
    $resimAdi = $urun['resim']; // Varsayılan eski resim

    if ($_FILES['resim']['name']) {
        $hedefKlasor = "../resimler/";
        $dosyaIsmi = time() . "_" . basename($_FILES["resim"]["name"]);
        $hedefDosya = $hedefKlasor . $dosyaIsmi;
        
        if (move_uploaded_file($_FILES["resim"]["tmp_name"], $hedefDosya)) {
            $resimAdi = $dosyaIsmi;
        }
    }

    $guncelle = $db->prepare("UPDATE urunler SET urun_adi=?, aciklama=?, fiyat=?, resim=?, kategori=? WHERE id=?");
    $sonuc = $guncelle->execute([$adi, $aciklama, $fiyat, $resimAdi, $kategori, $id]);

    if ($sonuc) {
        header("Location: urunler.php");
        exit;
    } else {
        $hata = "Güncelleme başarısız!";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ürün Düzenle - Yönetim Paneli</title>
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
                <div class="card-header">Ürün Düzenle</div>
                <div class="card-body">
                    <?php if(isset($hata)) { echo '<div class="alert alert-danger">'.$hata.'</div>'; } ?>
                    
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label>Ürün Adı</label>
                            <input type="text" name="urun_adi" class="form-control" value="<?php echo $urun['urun_adi']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control">
                                <option value="Okul" <?php echo ($urun['kategori'] == 'Okul') ? 'selected' : ''; ?>>Okul</option>
                                <option value="Ofis" <?php echo ($urun['kategori'] == 'Ofis') ? 'selected' : ''; ?>>Ofis</option>
                                <option value="Oyun" <?php echo ($urun['kategori'] == 'Oyun') ? 'selected' : ''; ?>>Oyun</option>
                                <option value="Kreatif" <?php echo ($urun['kategori'] == 'Kreatif') ? 'selected' : ''; ?>>Kreatif</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Açıklama</label>
                            <textarea name="aciklama" class="form-control" rows="3"><?php echo $urun['aciklama']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Fiyat (TL)</label>
                            <input type="number" step="0.01" name="fiyat" class="form-control" value="<?php echo $urun['fiyat']; ?>" required>
                        </div>
                        
                        <?php if($urun['resim']): ?>
                        <div class="mb-3">
                            <label>Mevcut Resim:</label><br>
                            <img src="../resimler/<?php echo $urun['resim']; ?>" width="100">
                        </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label>Yeni Resim (Değiştirmek istemiyorsanız boş bırakın)</label>
                            <input type="file" name="resim" class="form-control">
                        </div>
                        <button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
