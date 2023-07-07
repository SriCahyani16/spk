@extends('sb-admin/app')
@section('title','Alternatif')

@section('content')
    {{-- flashdata --}}

         <!-- Page Heading -->
         <h1 class="h3 mb-4 text-gray-800">Kriteria</h1>

         <a href="/add-criteria" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Kriteria</a>

         <!--Table-->
         <table class="table mt-4 table-hover table-bordered">
            <thead>
              <tr>

                <th scope="col">Id</th>
                <th scope="col">Nama</th>
                <th scope="col">Bobot</th>
                <th scope="col">Tipe</th>
                <th scope="col">Aksi</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($kriteria as $row )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->weight}}</td>
                    <td>{{$row->type}}</td>
                    <td width="20%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/edit-criteria/{{$row->id}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit </a>
                            <a href="/hapus-criteria/{{$row->id}}" type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Hapus</a>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
          </table>


@endsection
