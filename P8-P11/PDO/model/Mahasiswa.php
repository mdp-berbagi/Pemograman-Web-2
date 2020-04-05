<?php
require_once("config/database.php");

class Mahasiswa extends Database {
    private String $table = "mahasiswa";

    /**
     * Add new mahasisswa
     * 
     * @param array $newData
     * 
     * @return bool
     * @return int
     */
    function addMahasiswa(Array $newData) {
        $database = Database::start();

        // ambil field dari array keys
        $field  = "`".implode("`,`", array_keys($newData))."`";


        // looping untuk mendapatkan berapa banyak tanda tanya
        for($i = 0; $i < count($newData); $i++){
            $question_symbol[] = "?";
        }


        // hasil array dari looping di gabung ($question_symbol nilainya ['?','?'] menjadi "?,?")
        $question_symbol = implode(",", $question_symbol);


        // pripare query dan masukan dataset tadi ke sana
        $result = $database->prepare("INSERT INTO {$this->table}({$field}) VALUES ({$question_symbol})");

        /**
         * lakukan query pripare dengan kasih parm dataSetnya denga array values
         * 
         * array values mengembalikan nilai [0 => 1822250092, 1 => 'abdul aziz']
         * execute harus menggunakan array values
         */
        $result = $result->execute(array_values($newData));
        

        /**
         * mengembalikan nilai balik dengan ID mahasiswa yg baru di masukan
         * 
         * (int) itu mengubah numeric menjadi number
         * numeric itu text tapi nilainy angka misal di java String x = "1" di ubah jadi Int x = 1 dengan (int) itu
         */
        return $database->LastInsertId() < 1 ? false : (int) $database->LastInsertId();
        
    }


    /**
     * Edit Mahasiswa
     * 
     * @param int $id
     * @param array $dataSet
     * 
     * @return bool 
     */
    function editMahasiswa(Int $id, Array $dataSet = []) {
        // mulia database
        $database = Database::start();


        // jadikan datasetna menjadi array, misal : ["'npm' => '?'", "'nama' => '?'"]
        foreach($dataSet as $field => $value) {
            $setQuery[] = "{$field} = '?'";
        }


        // gabungin array tadi dari ["'npm' => '?'", "'nama' => '?'"] menjadi string "'npm' => '?', 'nama' => '?'" 
        $setQuery = implode(",", $setQuery);


        // pripare query dan masukan dataset tadi ke sana
        $result = $database->prepare("UPDATE {$this->table} SET {$setQuery} WHERE id = {$id}");


        /**
         * lakukan query pripare dengan kasih parm dataSetnya denga array values
         * 
         * array values mengembalikan nilai [0 => 1822250092, 1 => 'abdul aziz']
         * execute harus menggunakan array values
         */
        $result = $result->execute(array_values($dataSet));

        /**
         * Balikin hasilnya true atau false (prosesnya berhasil / enggak)
         * 
         * rowCount akan mengebalikan nilai total data yang terubah ( kasus sekarang pasti satu )
         * dibuat ada > 0 supaya nilai baliknya true atau false
         */
        return ($result->rowCount() > 0);
    }

    /**
     * Ambil satu mahasiswa
     * 
     * @param int $id
     * 
     * @return array
     */
    function getMahasiswa(Int $id) {
        // mulai database
        $database = Database::start();

        // pripare biasa sama execute biasa
        $query = $database->prepare("SELECT * FROM {$this->table} WHERE id= '{$id}' LIMIT 1");
        $query->execute();

        // kembalikan nilai dengan PDO::FETCH_ASSOC untuk buat arrayny satu saja
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * ambil semua mahasiswa
     * 
     * @return array
     */
    function getAllMahasiswa() {

        // langsung aja, start trus query trus fetchAll
        return Database::start()->query("SELECT * FROM {$this->table}")->fetchAll();
    }


    /**
     * hapus satu mahasiswa
     * 
     * @return bool
     */
    function deleteMahasiswa(Int $id) {
        $database = Database::start();
        $deleted = $database->exec("DELETE FROM {$this->table} WHERE id = '{$id}'");

        return ($deleted > 0);
    }
}
