@extends('sb-admin/app')
@section('title','Alternatif')

@section('content')
    {{-- flashdata --}}

         <!-- Page Heading -->
         <h1 class="h3 mb-4 text-gray-800">Alternatif</h1>

         <a href="/add-alternative" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Alternatif</a>

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

         <!--Table-->
         <table class="table mt-4 table-hover table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Asal Sekolah</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Aksi</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($alternatif as $row )
                <tr>
                    <td>{{$loop->iteration}}</td>

                    <td>{{$row->name}}</td>
                    <td>{{$row->jk}}</td>
                    <td>{{$row->asalsekolah}}</td>
                    <td>{{$row->jurusan}}</td>
                    <td width="20%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/edit-alternative/{{$row->id}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit </a>
                            <a href="/hapus-alternative/{{$row->id}}" type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Hapus</a>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
          </table>


@endsection
