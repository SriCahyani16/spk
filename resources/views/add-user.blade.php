@extends('sb-admin/app')
@section('title','User')

@section('content')


   <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>

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

    <form action="/add-user" method="POST">
       @csrf
       <div class="form-group">
           <label for="nama">Nama</label>
           <input type="text" class="form-control" id="id" name='name'>
           @error('name')
           <small class="text-danger">{{ $message }}</small>
           @enderror
       </div>
        <div class="form-group">
           <label for="nama">Email</label>
           <input type="text" class="form-control" id="id" name='email'>
           @error('nama')
           <small class="text-danger">{{ $message }}</small>
           @enderror
           </div>

           <div class="form-group">
            <label for="nama">Password</label>
            <input type="text" class="form-control" id="id" name='password'>
            @error('nama')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>

           <div class="form-group">
            <label for="nama">Tipe</label>
           <select class="form-control" aria-label="Default select example" name="type" id="type">
            <option selected>--pilih--</option>
            <option value="0">Admin</option>
            <option value="1">Panitia</option>
          </select>
            @error('nama')
           <small class="text-danger">{{ $message }}</small>
           @enderror
           </div>

           <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
           <a hef="/add-user" class="btn btn-secondary btn-sm">Kembali</a>
     </form>
@endsection
