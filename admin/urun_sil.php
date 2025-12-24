<?php
session_start();
if (!isset($_SESSION['admin_giris'])) {
    header("Location: login.php");
    exit;
}
require 'baglan.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Önce resmi silmeye çalışalım (isteğe bağlı ama temizlik için iyi)
    $sorgu = $db->prepare("SELECT resim FROM urunler WHERE id = ?");
    $sorgu->execute([$id]);
    $resim = $sorgu->fetchColumn();

    if ($resim && file_exists("../resimler/" . $resim)) {
        unlink("../resimler/" . $resim);
    }

    $sil = $db->prepare("DELETE FROM urunler WHERE id = ?");
    $sil->execute([$id]);
}

header("Location: urunler.php");
exit;
?>
