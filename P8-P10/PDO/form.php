<?php
require_once("model/Mahasiswa.php");

$dbMhs = new Mahasiswa();
$hasilInputMahasiswa = $dbMhs->addMahasiswa([
    'npm' => '1822250091', 
    'nama' => 'Test',
    'jk' => 'L',
    'tempat_lahir' => 'JKT',
    'tanggal_lahir' => '1997-01-12'
]);