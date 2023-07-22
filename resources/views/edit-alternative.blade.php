@extends('sb-admin/app')
@section('title','Alternatif')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Edit Data Alternatif</h1>

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

    @foreach ($alternatif as $item )
    <form action="/update-alternative" method="POST">
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
        <label for="nama">Jenis Kelamin</label>
       <select class="form-control" aria-label="Default select example" name="jk" id="jk" value="{{ $item->jk }}">
        <option selected>--pilih--</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select>
        @error('nama')
       <small class="text-danger">{{ $message }}</small>
       @enderror
       </div>
           <div class="form-group">
           <label for="nama">Asal Sekolah</label>
           <input type="text" class="form-control" id="asalsekolah" name='asalsekolah' value="{{ $item->asalsekolah }}">
            @error('asalsekolah')
           <small class="text-danger">{{ $message }}</small>
           @enderror
           </div>
            <div class="form-group">
                <label for="nama">Jurusan</label>
               <select class="form-control" aria-label="Default select example" name="jurusan" id="jurusan" value="{{ $item->jurusan }}">
                <option selected>--pilih--</option>
                <option value="TP">TP</option>
                <option value="TKR">TKR</option>
                <option value="TSM">TSM</option>
                <option value="TKJ">TKJ</option>
                <option value="AK">AK</option>
                <option value="TEI">TEI</option>
              </select>
                @error('nama')
               <small class="text-danger">{{ $message }}</small>
               @enderror
               </div>

           <button type="submit" class="btn btn-primary btn-sm">Update</button>
           <a hef="/add-alternative" class="btn btn-secondary btn-sm">Kembali</a>
     </form>
     @endforeach
@endsection
