@extends('sb-admin/app')
@section('title','Alternatif')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Tambah Data Alternatif</h1>

    <form action="/add-alternative" method="POST">
       @csrf
       <div class="form-group">
           <label for="nama">Nama</label>
           <input type="text" class="form-control" id="id" name='name'>
           @error('name')
           <small class="text-danger">{{ $message }}</small>
           @enderror
       </div>
       <div class="form-group">
        <label for="nama">Jenis Kelamin</label>
       <select class="form-control" aria-label="Default select example" name="jk" id="jk">
        <option selected>--pilih--</option>
        <option value="l">Laki-laki</option>
        <option value="p">Perempuan</option>
      </select>
        @error('nama')
       <small class="text-danger">{{ $message }}</small>
       @enderror
       </div>

            <div class="form-group">
                <label for="nama">Jurusan</label>
               <select class="form-control" aria-label="Default select example" name="jurusan" id="jurusan">
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

               <div class="form-group">
                <label for="nama">Asal Sekolah</label>
                <input type="text" class="form-control" id="id" name='asalsekolah'>
                 @error('asalsekolah')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>

                <p><b>Score Criteria :</b></p>
                    @foreach($kriteria as $c)
                        <label for="">{{ $c->name }}</label>
                        <input type="number" name="{{ 'score'. $c->id }}" class="form-control mb-2">
                    @endforeach


           <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
           <a hef="/add-alternative" class="btn btn-secondary btn-sm">Kembali</a>
     </form>
@endsection
