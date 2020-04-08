<?php
if(!isset($_GET['target'])) {
    exit("Tidak bisa hapus data karna tidak ada target");
}

require_once("./Bimbingan.php");

$model_bimbingan = new Bimbingan();

$hasil_delete = $model_bimbingan->delete($_GET['target']);

if(!$hasil_delete) {
    exit("maaf, tidak bisa dihapus");
}

header("Location: ./daftarbimbingan.php");