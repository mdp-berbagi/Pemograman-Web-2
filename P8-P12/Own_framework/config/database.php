<?php 

/**
 * Checker Version Of PHP
 * PHP Varsi 7.4 harus
 */
$versi = explode(".", phpversion());
if((int) $versi[0].$versi[1] < 74) {
    exit("Tidak mendukung versi phpmu");
}

/**
 * Database Konfigurasi
 */
trait databaseConfiguration {
    protected $hostname     = "localhost";
    protected $username     = "root";
    protected $password     = "kmzwa3awaa";
    protected $database     = "test";
}