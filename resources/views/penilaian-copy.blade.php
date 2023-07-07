@extends('sb-admin/app')
@section('title','Kriteria')

@section('content')

<body>
    <div class="container mt-3">
        <h1><b>Sistem Pendukung Keputusan</b></h1>

        <div class="row mt-5">
            <div class="col">
                <h2 class="">Alternatif</h2>
            </div>
            <div class="col mt-2">
                <a href="/add-alternative" class="btn btn-sm btn-primary float-end" style="border-radius: 40px;">Add Alternatif</a>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Alternatif</th>
                    @foreach($kriteria as $c)
                        <th scope="col">{{ $c->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($alternatif as $i => $a)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $a->name }}</td>
                    @foreach($kriteria as $c)
                        <td>{{ $a->penilaian->where('kriteria_id', $c->id)->first()->score??'0' }}</th>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <hr>

        <div class="row mt-5">
            <div class="col">
                <h2 class="">Kriteria</h2>
            </div>
            <div class="col pt-2">
                <a href="add-criteria" class="btn btn-sm btn-primary float-end" style="border-radius: 40px;">Add Kriteria</a>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kriteria</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kriteria as $j => $c)
                <tr>
                    <th scope="row">{{ ++$j }}</th>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->weight }}</td>
                    <td>{{ ucfirst($c->type) }}</td>
                </tr>
                @endforeach
        </table>

        <br>
        <br>
        <center>
            <a href="/hasil" style="width: 200px;" class="btn btn-dark">Jalankan Operasi</a>
        </center>
        <br>
    </div>

</body>

</html>

@endsection
