<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Mahasiswa</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
</head>

<body>
    <div class='container h1 pt-5 pb-1'>
        <b class='text-primary'>|</b> Formulir Mahasiswa
    </div>

    <div class='container'>
        <form>
            <div class="form-col">
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input class="form-control" name="name" type="text" id="nama" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="">NPM</label>
                    <input class="form-control" name='npm' type="text" id="npm" placeholder="NPM">
                </div>
                <div class="form-group d-flex align-items-center">
                    <input class="gender mx-2" name='gender' type="radio" id="gender" value="L">Laki-laki
                    <input class="gender mx-2" name='gender' type="radio" id="gender" value="P">Perempuan
                </div>
                <div class="form-group">
                    <label for="">tempat lahir</label>
                    <input class="form-control" type="text" name='tempat_lahir' id="tempat_lahir" placeholder="tempat lahir">
                </div>
                <div class="form-group">
                    <label for="">tanggal lahir</label>
                    <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir">
                </div>
                <br>
                <button class="btn btn-primary" id="submit" type="submit">Tambah Baru</button>
                <a href='./' class='btn btn-warning'>Batal<a>
            </div>
        </form>
    </div>
</body>

</html>