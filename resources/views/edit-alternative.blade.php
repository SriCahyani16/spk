@extends('sb-admin/app')
@section('title','Alternatif')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Edit Data Alternatif</h1>
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
                <option value="tpm">TPM</option>
                <option value="tkro">TKRO</option>
                <option value="tbsm">TBSM</option>
                <option value="tkj">TKJ</option>
                <option value="ak">AK</option>
                <option value="tei">TEI</option>
              </select>
                @error('nama')
               <small class="text-danger">{{ $message }}</small>
               @enderror
               </div>

           <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
           <a hef="/add-alternative" class="btn btn-secondary btn-sm">Kembali</a>
     </form>
     @endforeach
@endsection
