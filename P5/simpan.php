<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_POST)) {
            echo "Tidak ada data yang di simpan";
        }else{
            $foto = $_FILES['foto'];

            foreach($_POST as $key => $val) {
                $GLOBALS[$key] = $val;
            }
    
            foreach($_POST as $key => $val) {
                echo "{$key} : {$val} <br />";
            }

            echo $foto['name'];
        }
        
    ?>
</body>
</html>