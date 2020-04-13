<?php
require_once(__DIR__."/Model.php");

class Bimbingan extends Model {
    public String $table = "bimbingan";

    public Array $join = [
        'mahasiswa' => '`mahasiswa`.`id` = `bimbingan`.`id_mahasiswa`'
    ];
}