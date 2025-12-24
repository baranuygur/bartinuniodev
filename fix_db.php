<?php
require 'admin/baglan.php';

try {
    // Kategori sütununu ekle
    $db->exec("ALTER TABLE urunler ADD COLUMN kategori VARCHAR(50) DEFAULT 'Genel'");
    echo "Kategori sütunu başarıyla eklendi.<br>";
} catch (PDOException $e) {
    if ($e->getCode() == '42S21') { // Duplicate column name
        echo "Kategori sütunu zaten mevcut.<br>";
    } else {
        echo "Hata: " . $e->getMessage() . "<br>";
    }
}

try {
    // Mevcut ürünlere rastgele kategori ata (Eğer boşsa)
    $stmt = $db->query("SELECT id FROM urunler WHERE kategori IS NULL OR kategori = '' OR kategori = 'Genel'");
    $urunler = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $kategoriler = ['Okul', 'Ofis', 'Oyun', 'Kreatif'];
    
    foreach ($urunler as $urun) {
        $rastgeleKategori = $kategoriler[array_rand($kategoriler)];
        $update = $db->prepare("UPDATE urunler SET kategori = ? WHERE id = ?");
        $update->execute([$rastgeleKategori, $urun['id']]);
    }
    echo "Veriler güncellendi.";
} catch (PDOException $e) {
    echo "Veri güncelleme hatası: " . $e->getMessage();
}
?>
