<?php
$host = "localhost";
$kullanici = "root";
$sifre = "";
$veritabani = "bartinuniodev";

try {
    $db = new PDO("mysql:host=$host;dbname=$veritabani;charset=utf8", $kullanici, $sifre);
    // Hata yakalama modunu açalım
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}
?>
