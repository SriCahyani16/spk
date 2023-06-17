
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MAYDAS SPK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
</head>
<style>
    * {
        font-family: Poppins;
    }
</style>
<body>
    <div class="container mt-3">

        <div class="row">
            <div class="col-4 offset-4">
                <h1><b>Add Alternative</b></h1>
                <form action="/add-alternative" method="post">
                    @csrf
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                    <label for="">Jenis Kelamin</label>
                    <select name="jk" class="form-select" id="">
                    <option value="benefit">--pilih--</option>
                    <option value="lk">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                    </select>
                    <label for="">Asal Sekolah</label>
                    <input type="text" name="name" class="form-control">
                    <label for="">Jurusan</label>
                    <select name="jurusan" class="form-select" id="">
                        <option value="benefit">--pilih--</option>
                        <option value="tpm">TPM</option>
                        <option value="tkro">TKRO</option>
                        <option value="tbsm">TBSM</option>
                        <option value="tkj">TKJ</option>
                        <option value="ak">AK</option>
                        <option value="ekl">EKL</option>
                    <hr>
                    <p><b>Score Criteria :</b></p>
                    @foreach($kriteria as $c)
                        <label for="">{{ $c->name }}</label>
                        <input type="number" name="{{ 'score'.$c->id }}" class="form-control mb-2">
                    @endforeach
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
