<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Semua Mahasiswa</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

</head>

<body>
    <div id='app'>
        <form class="container form-horizontal py-4">
            <fieldset>

                <!-- Form Name -->
                <legend>| Masukan Mahasiswa Baru</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="npm">NPM</label>
                    <div class="col-md-4">
                        <input 
                            id="npm" 
                            name="npm" 
                            type="text" 
                            placeholder="masukan npm" 
                            class="form-control input-md"
                            required="" 
                        />
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nama">Nama</label>
                    <div class="col-md-4">
                        <input 
                            id="nama" 
                            name="nama" 
                            type="text" 
                            placeholder="Nama Lengkap"
                            class="form-control input-md" 
                            required=""
                        />
                    </div>
                </div>

                <!-- Multiple Radios -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="jk">Jenis Kelamin</label>
                    <div class="col-md-4">
                        <div class="radio">
                            <label for="jk-0">
                                <input type="radio" name="jk" id="jk-0" value="L" checked="checked">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="radio">
                            <label for="jk-1">
                                <input type="radio" name="jk" id="jk-1" value="P">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tempat_lahir">Tepat Lahir</label>
                    <div class="col-md-4">
                        <input 
                            id="tempat_lahir" 
                            name="tempat_lahir" 
                            type="text" 
                            placeholder="Misal : jakarta"
                            class="form-control input-md" 
                            required="" 
                        />
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tanggal_lahir">Tanggal Lahir</label>
                    <div class="col-md-4">
                        <input 
                            id="tanggal_lahir" 
                            name="tanggal_lahir" 
                            type="text" 
                            placeholder=""
                            class="form-control input-md" 
                            required="" 
                        />
                    </div>
                </div>

            </fieldset>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>

</html>