@extends('sb-admin/app')
@section('title','User')

@section('content')


    <h1 class="h3 mb-4 text-gray-800">Edit User</h1>
    @foreach ($users as $item )

    <form action="/update-user" method="POST">
       @csrf
       <input type="hidden" name="id" value="{{ $item->id }}" >
       <div class="form-group">
           <label for="nama">Nama</label>
           <input type="text" class="form-control" id="name" name='name' value="{{ $item->name }}">
           @error('name')
           <small class="text-danger">{{ $message }}</small>
           @enderror
       </div>
       <div class="form-group">
           <label for="nama">Email</label>
           <input type="text" class="form-control" id="email" name='email' value="{{ $item->email }}">
           @error('nama')
           <small class="text-danger">{{ $message }}</small>
           @enderror
           </div>

           <div class="form-group">
            <label for="nama">Tipe</label>
           <select class="form-control" aria-label="Default select example" name="type" id="type" value="{{ $item->type }}">
            <option selected>--pilih--</option>
            <option value="0">Admin</option>
            <option value="1">Panitia</option>
          </select>
            @error('nama')
           <small class="text-danger">{{ $message }}</small>
           @enderror
           </div>

           <button type="submit" class="btn btn-primary btn-sm">Update</button>
           <a hef="/add-user" class="btn btn-secondary btn-sm">Kembali</a>
     </form>
     @endforeach
@endsection
