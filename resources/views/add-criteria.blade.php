@extends('sb-admin/app')
@section('title','Kriteria')

@section('content')


   <h1 class="h3 mb-4 text-gray-800">Tambah Kriteria</h1>

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

    <form action="/add-criteria" method="POST">
       @csrf
       <div class="form-group">
           <label for="nama">Nama</label>
           <input type="text" class="form-control" id="id" name='name'>
           @error('name')
           <small class="text-danger">{{ $message }}</small>
           @enderror
       </div>
       <div class="form-group">
           <label for="nama">Bobot</label>
           <input type="text" class="form-control" id="id" name='weight'>
           @error('nama')
           <small class="text-danger">{{ $message }}</small>
           @enderror
           </div>

           <div class="form-group">
            <label for="nama">Tipe</label>
           <select class="form-control" aria-label="Default select example" name="type" id="type">
            <option selected>--pilih--</option>
            <option value="benefit">Benefit</option>
            <option value="cost">Cost</option>
          </select>
            @error('nama')
           <small class="text-danger">{{ $message }}</small>
           @enderror
           </div>

           <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
           <a hef="/add-criteria" class="btn btn-secondary btn-sm">Kembali</a>
     </form>
@endsection
