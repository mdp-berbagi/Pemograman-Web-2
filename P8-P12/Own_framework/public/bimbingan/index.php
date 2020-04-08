<?php

/**
 * Contoh Manggil Koneksi Lainya : 
 * 
 * include_once("./config/connection.php");
 * require("./config/connection.php");
 * include("./config/connection.php");
 * 
 */
require_once("../../model/Bimbingan.php");

// buat object
$model_bbng = new Bimbingan();

// tarik data (BOLEH DI FOREACH, INI ARRAY BIASA)
$model_bbng = $model_bbng->joinWith('mahasiswa', ['nama' => 'nama_mahasiswa'])->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajement Bimbingan</title>

    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
        crossorigin="anonymous" 
    />
</head>

<body>
    <div id='app'>
        <?php
            require_once "../_components/nav.php"
        ?>
        <div class='container h1 pt-5 pb-1'>
            <b class='text-primary display-4'>|</b> Manajement Bimbingan
        </div>
        <div class='container py-3'>
            <div class='row'>

                <!-- TABLE MAHASISWA -->
                <div class='col-12'>
                    <table id='datatable' class='table table-sm'></table>
                    <br />
                    
                    <a href='./form.php' class='btn btn-primary'>Buat Baru<a>
                </div>
                <!-- END TABLE MAHASISWA -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src='//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js'></script>

    <script>
        $(function() {
            $('#datatable').DataTable({
                // Kebutuhan
                data: <?php echo isset($model_bbng) ? json_encode($model_bbng) : 'null' ?>,
                columns: [{
                        data: 'id',
                        title: "ID"
                    },
                    {
                        data: 'nama_mahasiswa',
                        title: "Nama Mahasiswa"
                    },
                    {
                        data: 'dosen',
                        title: "Nama Dosen"
                    },
                    {
                        data: 'waktu',
                        title: 'Tanggal',
                        render: function(data) {
                            return data.split(" ")[0];
                        }
                    },
                    {
                        data: 'waktu',
                        title: 'Jam',
                        render: function(data) {
                            return data.split(" ")[1];
                        }
                    },
                    {
                        title: 'Aksi',
                        data: 'id',
                        render: function(id) {
                            return "" + 
                                "<a href='./form.php?target=" + id + "' class='btn btn-primary mx-1'>Edit<a>" + 
                                "<a href='./delete.php?target=" + id + "' class='btn btn-danger mx-1'>Delete<a>"
                            ;
                        }
                    }
                ],

                // gaya-gayaan
                responsive: true,
                headerCallback: function(thead) {
                    $(thead).addClass("bg-primary text-light");
                }
            });
        });
    </script>
</body>

</html>