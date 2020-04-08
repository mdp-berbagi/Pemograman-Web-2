<?php
require_once(__DIR__."/BaseDatabase.php");

class Bimbingan extends BaseDatabase {
    public String $table = "bimbingan";

    public Array $join = [
        'mahasiswa' => '`mahasiswa`.`id` = `bimbingan`.`id_mahasiswa`'
    ];
}