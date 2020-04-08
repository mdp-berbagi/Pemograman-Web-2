<?php
require_once("./Koneksi.php");

Class Bimbingan extends Koneksi {
    private $table = "tbl_bimbingan";

    public function __construct()
    {
        parent::__construct();
    }

    function delete($id) {
        $deleted = $this->koneksi->exec("DELETE FROM {$this->table} WHERE id = '{$id}'");

        return ($deleted > 0);
    }


    function getAll() {
        return $this->koneksi->query("SELECT * FROM {$this->table}")->fetchAll();
    }
}