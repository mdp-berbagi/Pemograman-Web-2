<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bimbingan</title>
    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
        crossorigin="anonymous" 
    />
</head>
<body>
    <div class='container'>
        <table class='table'>
            <tr>
                <th>No</th> 
                <th>Nama Dosen</th>
                <th>Materi Bimbingan</th>
                <th>Tanggal Bimbingan</th>
                <th>Jam Bimbingan</th>
                <th>Aksi</th>
            </tr>
            <?php
                require_once('./Bimbingan.php');

                $bimbingan = new Bimbingan();

                foreach($bimbingan->getAll() as $row) {
                    $array_waktu = explode(" ", $row['tgl_bimbingan']);

                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['dosen']}</td>";
                    echo "<td>{$row['materi_bimbingan']}</td>";
                    echo "<td>{$array_waktu[0]}</td>";
                    echo "<td>{$array_waktu[1]}</td>";
                    echo "<td><a class='btn btn-danger' href='hapusbimbingan.php?target={$row['id']}'>Hapus</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>