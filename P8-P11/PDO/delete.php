<?php

if(!isset($_GET['target'])) {
    exit("Tidak bisa hapus data karna tidak ada target");
}

require_once("./model/Mahasiswa.php");

$model_mhs = new Mahasiswa();

$hasil_delete = $model_mhs->deleteMahasiswa($_GET['target']);

if(!$hasil_delete) {
    exit("maaf, tidak bisa dihapus");
}

header("Location: ../");
