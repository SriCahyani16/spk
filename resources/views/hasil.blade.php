@extends('sb-admin/app')
@section('title','Alternatif')

@section('content')
<body>
    <div class="container mt-5">

        <h2 class="" class="mt-5"><a href="/" style="text-decoration: none;color: black;"></a> <b>Hasil</b></h2>

        <table class="table table-striped mb-5">
            <thead>
                <tr>
                    <th scope="col">Ranking</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Nilai Akhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $i => $d)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $d->alternatif->name }}</td>
                    <td>{{ $d->alternatif->jurusan }}</td>
                    <td>{{ $d->nilai_akhir }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>

@endsection
