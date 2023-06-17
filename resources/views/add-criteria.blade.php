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
                <h1><b>Add Criteria</b></h1>
                <form action="/add-criteria" method="post">
                    @csrf
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                    <label for="">Weight</label>
                    <input type="number" name="weight" class="form-control">
                    <label for="">Type</label>
                    <select name="type" class="form-select" id="">
                        <option value="benefit">Benefit</option>
                        <option value="cost">Cost</option>
                    </select>
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
