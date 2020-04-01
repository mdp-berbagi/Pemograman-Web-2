<?php
require_once("config/database.php");

class Mahasiswa extends Database {
    private String $table = "mahasiswa";

    /**
     * Add new mahasisswa
     * 
     * @param Array $newData
     * @return mixed
     */
    function addMahasiswa(Array $newData) {
        $database = Database::start();

        // ambil field dari array keys
        $field  = "`".implode("`,`", array_keys($newData))."`";

        // looping untuk mendapatkan berapa banyak tanda tanya
        for($i = 0; $i < count($newData); $i++){
            $question_symbol[] = "?";
        }

        // hasil array dari looping di gabung (misal dari ['?','?'] menjadi "?,?")
        $question_symbol = implode(",", $question_symbol);

        // membuat PDO pripare
        $q = $database->prepare("INSERT INTO {$this->table}({$field}) VALUES ({$question_symbol})");
        $q = $q->execute(array_values($newData));

        // mengembalikan nilai balik
        return $database->LastInsertId();
    }

    function editMahasiswa() {

    }   

    function getAllMahasiswa() {

    }

    function getMahasiswa() {

    }

    function deleteMahasiswa() {

    }
}
