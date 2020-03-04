<?php
/**
 * Fungsi Tanggal
 * 
 * @param String
 * @author Abdul Aziz 
 * 
 * Y = 4 Dikit Tahun
 * M = Nama Bulan (Ex. January)
 * m = 2 Digit bulan (Ex. 0 - 12)
 * D = Nama Hari (Ex. Sunday)
 * d = 2 Dugit Tanggal (Ex. 1 - 31)
 * H = 24 Jam
 * h = 12 Jam
 * i = Menit
 * s = Detik
 * a = am / pm
 * A = AM / PM
 * 
 */


echo date("Y-m-d H:i:s");
echo "<br />";
echo date("D, d M Y");
echo "<br />";

/**
 * Fungsi Buatan, Membuat Nama Hari
 * 
 */
function ambilHariIni() {
    $nama_hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    $hari_dalam_minggu = date("w");

    return $nama_hari[$hari_dalam_minggu];
}
echo ambilHariIni();
echo "<br />";

/**
 * Fungsi Buatan, Membuat Nama Bulan
 * 
 */
function ambilBulanIni() {
    $nama_bulan = [
        "Januari", "Februari", "Maret", "April", "Mai", "Juli", "Juni",
        "Agustus", "September", "Oktober", "November", "Desember"
    ];

    $bulan_skrng = date("m") - 1;

    return $nama_bulan[$bulan_skrng];
}
echo ambilBulanIni();
echo "<br />";

echo "<br />";
echo "<br />";

/**
 * Nampilan Berdasarkan Instruksi
 * 
 */
echo ambilHariIni(). ", ". date("d "). ambilBulanIni(). " ". date("Y");
