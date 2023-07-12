@extends('sb-admin/app')
@section('title','Kriteria')

@section('content')


    <h1 class="h3 mb-4 text-gray-800">Edit Kriteria</h1>
    @foreach ($kriteria as $item )

    <form action="/update-criteria" method="POST">
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
           <label for="nama">Bobot</label>
           <input type="text" class="form-control" id="weight" name='weight' value="{{ $item->weight }}">
           @error('nama')
           <small class="text-danger">{{ $message }}</small>
           @enderror
           </div>

           <div class="form-group">
            <label for="nama">Tipe</label>
           <select class="form-control" aria-label="Default select example" name="type" id="type" value="{{ $item->type }}">
            <option selected>--pilih--</option>
            <option value="benefit">Benefit</option>
            <option value="cost">Cost</option>
          </select>
            @error('nama')
           <small class="text-danger">{{ $message }}</small>
           @enderror
           </div>

           <button type="submit" class="btn btn-primary btn-sm">Update</button>
           <a hef="/add-criteria" class="btn btn-secondary btn-sm">Kembali</a>
     </form>
     @endforeach
@endsection
