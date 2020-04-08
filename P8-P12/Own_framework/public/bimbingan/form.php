<?php

// variable yang menyatakan update / insert (karna formnya sama)
$isUpdating = isset($_GET['target']);

// buat judul aja
$title = $isUpdating ? "Update" : "Buat Baru";

// tarik model
require_once("../../model/Bimbingan.php");

// jika proses update / insert masuk sini
if(count($_POST)) {
    exit("WIP!");
    
    // buat object
    $model_bbgn = new Bimbingan();

    // jadi klo update dia ke editMahasoswa kalo enggak dia ke addMhs
    $hasil = $isUpdating 
        ? $model_bbgn->editRow($_GET['target'], $_POST) 
        : $model_bbgn->addOnce($_POST);

    // hasilnya nantik klo gk berhasil munjul error
    if(!$hasil) {
        exit($isUpdating ? "Maaf, tidak ada perubahan terjadi" : "Kesalahan pada pembuatan data");
    }

    // kembali ke halaman utama
    header("Location: ./");

    // keluar dan tidak melanjutkan skrip ke bawah
    exit();
}


if($isUpdating) {
    $model_bbgn = new Bimbingan();
    $current_data = $model_bbgn->getRow($_GET['target']);

    $current_data['waktu'] = explode(" ", $current_data['waktu']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?> Bimbingan</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
</head>

<body>
    <div class='container h1 pt-5 pb-1'>
        <b class='text-primary'>|</b> <?php echo $title ?> Bimbingan
    </div>

    <div class='container'>
        <form target="" method="POST">
            <div class="form-col">
                <div class="form-group">
                    <label for="dosen">Nama Dosen</label>
                    <input 
                        class="form-control" 
                        name="dosen" 
                        type="text" 
                        value="<?php echo $isUpdating ? $current_data['dosen'] : ""; ?>" 
                        id="dosen" 
                        placeholder="Nama Dosen"
                    />
                </div>
                <div class="form-group">

                    <label for="tanggal_bimbingan">Tanggal</label>
                    <input 
                        class="form-control" 
                        value="<?php echo $isUpdating ? $current_data['waktu'][0] : ""; ?>" 
                        type="date" 
                        name="tanggal_bimbingan" 
                        id="tanggal_bimbingan"
                    />

                </div>
                <div class="form-group">

                    <label for="jam_bimbingan">Jam</label>
                    <input 
                        class="form-control" 
                        value="<?php echo $isUpdating ? $current_data['waktu'][1] : ""; ?>" 
                        type="time" 
                        name="jam_bimbingan" 
                        id="jam_bimbingan"
                    />

                </div>
                <br>
                <button class="btn btn-primary" disabled id="submit" type="submit"><?php echo $title ?> ( WIP ) </button>
                <a href='./' class='btn btn-danger'>Batal<a>
            </div>
        </form>
    </div>
</body>

</html>