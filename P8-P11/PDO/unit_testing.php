<?php
require_once("model/Mahasiswa.php");

$dbMhs = new Mahasiswa();
$hasilInputMahasiswa = $dbMhs->addMahasiswa([
    'npm' => '1822250044', 
    'nama' => 'Test',
    'jk' => 'L',
    'tempat_lahir' => 'JKT',
    'tanggal_lahir' => '1997-01-12'
]);

echo "Hasil Insert : ";
var_dump($hasilInputMahasiswa);

echo "============================== \n";
echo "\n";





$dataMhs = $dbMhs->getMahasiswa($hasilInputMahasiswa);
echo "Hasil View : ";
var_dump($dataMhs);

echo "============================== \n";
echo "\n";





$dataMhs = $dbMhs->getAllMahasiswa();
echo "Hasil Get All MHS : ";
var_dump($dataMhs);

echo "============================== \n";
echo "\n";





$hasilHapus = $dbMhs->deleteMahasiswa("1");
echo "Hasil Delete : ";
var_dump($hasilHapus);

echo "============================== \n";
echo "\n";