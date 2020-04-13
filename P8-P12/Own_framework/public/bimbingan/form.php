<?php
require_once("../../config/version.php");

// variable yang menyatakan update / insert (karna formnya sama)
$isUpdating = isset($_GET['target']);

// buat judul aja
$title = $isUpdating ? "Update" : "Buat Baru";

// tarik file model
require_once("../../model/Bimbingan.php");

// jika proses update / insert masuk sini
if(count($_POST)) {

    // buat tanggal dan jamnya nyatu
    $_POST['waktu'] = "{$_POST['tanggal_bimbingan']} {$_POST['jam_bimbingan']}";
    
    // buang tanggal dan jam di post
    unset($_POST['tanggal_bimbingan']);
    unset($_POST['jam_bimbingan']);

    // buat object
    $model_bbgn = new Bimbingan();

    // jadi klo update dia ke editMahasoswa kalo enggak dia ke addMhs
    $hasil = $isUpdating 
        ? $model_bbgn->editRow($_GET['target'], $_POST) 
        : $model_bbgn->addOnce($_POST);

    // hasilnya nantik klo gk berhasil munjul error
    if(!$hasil) {
        exit($isUpdating ? "Tidak ada perubahan data terjadi" : "Tidak ada pembuatan data terjadi");
    }

    // kembali ke halaman utama
    header("Location: ./");

    // keluar dan tidak melanjutkan skrip ke bawah
    exit();
}


if($isUpdating) {
    $model_bbgn = new Bimbingan();
    $current_data = $model_bbgn->joinWith('mahasiswa', ['id' => 'id_mahasiswa'])->getRow($_GET['target']);

    $current_data['waktu'] = explode(" ", $current_data['waktu']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?> Bimbingan</title>

    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
        crossorigin="anonymous" 
    />
</head>

<body>
    <div class='container h1 pt-5 pb-1'>
        <b class='text-primary'>|</b> <?php echo $title ?> Bimbingan
    </div>

    <div class='container'>
        <form target="" method="POST">
            <div class="form-col">
                <div class="form-group">
                    <label for="mhs">Mahasiswa</label>
                    <select 
                        id='mhs'
                        class='form-control'
                        name='id_mahasiswa'
                    >
                        <option value='' hidden selected>
                            Pilih Mahasiswa
                        </option>
                        <?php
                            require_once("../../model/Mahasiswa.php");

                            $model_mahasiswa = new Mahasiswa();
                            $dataSemuaMahasiswa = $model_mahasiswa->getAll();

                            foreach($dataSemuaMahasiswa as $row) {
                                echo "<option value='{$row['id']}'>{$row['nama']} - {$row['npm']}</option>";
                            }
                        ?>
                    </select>

                    <?php
                    if($isUpdating) {
                    ?>
                        <script>
                            document.getElementById('mhs').value = "<?=  $current_data['id_mahasiswa'] ?>";
                        </script>
                    <?php
                    }
                    ?>

                </div>
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
                    <label for="materi">Materi</label>
                    <input 
                        class="form-control" 
                        name="materi" 
                        type="text" 
                        value="<?php echo $isUpdating ? $current_data['dosen'] : ""; ?>" 
                        id="materi" 
                        placeholder="Materi"
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
                <button class="btn btn-primary" id="submit" type="submit"><?php echo $title ?></button>
                <a href='./' class='btn btn-danger'>Batal<a>
            </div>
        </form>
    </div>
</body>

</html>