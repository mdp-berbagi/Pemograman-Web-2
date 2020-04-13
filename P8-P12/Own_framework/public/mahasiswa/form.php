<?php
require_once("../../config/version.php");

// variable yang menyatakan update / insert (karna formnya sama)
$isUpdating = isset($_GET['target']);

// buat judul aja
$title = $isUpdating ? "Update" : "Buat Baru";

// tarik model
require_once("../../model/Mahasiswa.php");

// jika proses update / insert masuk sini
if(count($_POST)) {
    // buat object
    $model_mhs = new Mahasiswa();

    // jadi klo update dia ke editMahasoswa kalo enggak dia ke addMhs
    $hasil = $isUpdating 
        ? $model_mhs->editRow($_GET['target'], $_POST) 
        : $model_mhs->addOnce($_POST);

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
    $model_mhs = new Mahasiswa();
    $current_data = $model_mhs->getRow($_GET['target']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?> Mahasiswa</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
</head>

<body>
    <div class='container h1 pt-5 pb-1'>
        <b class='text-primary'>|</b> <?php echo $title ?> Mahasiswa
    </div>

    <div class='container'>
        <form target="" method="POST">
            <div class="form-col">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input 
                        class="form-control" 
                        name="nama" 
                        type="text" 
                        value="<?php echo $isUpdating ? $current_data['nama'] : ""; ?>" 
                        id="nama" 
                        placeholder="Nama Lengkap"
                    />
                </div>
                <div class="form-group">
                    <label for="npm">NPM</label>
                    <input 
                        class="form-control" 
                        name='npm' 
                        type="text" 
                        id="npm" 
                        value="<?php echo $isUpdating ? $current_data['npm'] : ""; ?>" 
                        placeholder="Nomor Pokok Mahasiswa"
                    />
                </div>
                <div class="form-group d-flex align-items-center">
                    <input 
                        class="gender mx-2" 
                        name='jk' 
                        type="radio" 
                        id="gender_l" 
                        value="L"
                        <?php echo $isUpdating && $current_data['jk'] == "L" ? "checked" : ""; ?>
                    >
                    <label for='gender_l'>Laki-laki</label>
                    <input 
                        class="gender mx-2" 
                        name='jk' 
                        type="radio" 
                        id="gender_p" 
                        value="P"
                        <?php echo $isUpdating && $current_data['jk'] == "W" ? "checked" : ""; ?>
                    >
                    <label for='gender_p'>Perempuan</label>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">tempat lahir</label>
                    <input 
                        class="form-control" 
                        value="<?php echo $isUpdating ? $current_data['tempat_lahir'] : ""; ?>" 
                        type="text" 
                        name='tempat_lahir' 
                        id="tempat_lahir" 
                        placeholder="tempat lahir"
                    />
                </div>
                <div class="form-group">

                    <label for="tanggal_lahir">tanggal lahir</label>
                    <input 
                        class="form-control" 
                        value="<?php echo $isUpdating ? $current_data['tanggal_lahir'] : ""; ?>" 
                        type="date" 
                        name="tanggal_lahir" 
                        id="tanggal_lahir"
                    />

                </div>
                <br>
                <button class="btn btn-primary" id="submit" type="submit"><?php echo $title ?></button>
                <a href='./' class='btn btn-danger'>Batal<a>
            </div>
        </form>
    </div>
</body>

</html>