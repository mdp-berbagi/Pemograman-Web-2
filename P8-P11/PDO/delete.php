<?php
// liat apakah ada target yang harus di delete
if(!isset($_GET['target'])) {
    exit("Tidak bisa hapus data karna tidak ada target");
}

// panggil model
require_once("./model/Mahasiswa.php");

// buat object
$model_mhs = new Mahasiswa();

// mencoba delete
$hasil_delete = $model_mhs->deleteMahasiswa($_GET['target']);

// check berhasil ato idak
if(!$hasil_delete) {
    exit("maaf, tidak bisa dihapus");
}

// untuk kembali ke halaman awal otomatis
header("Location: ../");
