<?php 

require_once("./config/connection.php");

/**
 * Contoh Manggil Koneksi Lainya : 
 * 
 * include_once("./config/connection.php");
 * require("./config/connection.php");
 * include("./config/connection.php");
 * 
 */

$data = $mysql->prepare("SELECT * FROM mahasiswa");

$data->setFetchMode(PDO::FETCH_ASSOC);
$data->execute();

$semua_mahasiswa = $data->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Semua Mahasiswa</title>

    <link 
        rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
        crossorigin="anonymous"
    />

</head>
<body>
    <div id='app'>
        <div class='container h1'>
            <b class='text-primary'>|</b> Tampil Semua Mahasiswa
        </div>

        <!-- TABLE MAHASISWA -->
        <div class='container py-3'>
            <table id='mhs_table' style='width:100%' class='table table-sm'></table>
        </div>
        <!-- END TABLE MAHASISWA -->

    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
    <script src='//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js'></script>

    <script>
        $(function() {
            $('#mhs_table').DataTable({
                // Kebutuhan
                data: <?php echo isset($semua_mahasiswa) ? json_encode($semua_mahasiswa) : 'null' ?>,
                columns: [
                    { data: 'id', title: "ID" },
                    { data: 'npm', title: "NPM" },
                    { data: 'nama', title: "Nama" },
                    { 
                        data: 'jk',
                        render: function(data) {
                            return data == "L" ? "Pria" : "Wanita";
                        }
                    },
                    { data: 'tempat_lahir', title: "Tempat Lahir" },
                    { data: 'tanggal_lahir', title: "Tanggal Lahir" }
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