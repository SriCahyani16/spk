@extends('sb-admin/app')
@section('title','Penilaian')

@section('content')

<body>
    <!-- Pemberitahuan sukses dan tidak sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Alternatif</h1>
        </div>

        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
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

        <div class="row mt-3">
            <div class="col">
                <h2 class="h3 mb-0 text-gray-800">Kriteria</h2>
            </div>
            {{-- <div class="col pt-2">
                <a href="add-criteria" class="btn btn-sm btn-primary float-end" style="border-radius: 40px;">Add Kriteria</a>
            </div> --}}
        </div>

        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
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
            </tbody>
        </table>
        <center>
            <a href="/hasil" style="width: 200px;" class="btn btn-dark">Hitung Nilai</a>
        </center>
        <br>



</body>

</html>

@endsection
