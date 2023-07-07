@extends('sb-admin/app')
@section('title','Penilaian')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Nilai Siswa</h1>

    <form action="/hitung-penilaian" method="POST">
       @csrf
       <div class="form-group">
        @foreach ($alternatif as $item)
           <label for="nama">Nama</label>
           <select type="text" class="form-control" id="id" name='name'>
            <option value=""></option>
            <option value="{{ $item->id }}">{{ $item->name }}</option> </select>
           @error('name')
           <small class="text-danger">{{ $message }}</small>
           @enderror
       </div>

           <div class="form-group">
            <label for="nama">Jurusan</label>
            <select type="text" class="form-control" id="id" name='jurusan'>
             <option value=""></option>
             <option value="{{ $item->id }}">{{ $item->jurusan }}</option> </select>
            @error('jurusan')
           <small class="text-danger">{{ $message }}</small>
           @enderror
           </div>
           <div class="form-group">
           <label for="nama">Asal Sekolah</label>
            <select type="text" class="form-control" id="id" name='asalsekolah'>
             <option value=""></option>
             <option value="{{ $item->id }}">{{ $item->asalsekolah }}</option> </select>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        @endforeach
        </div>

        <p><b>Masukan Nilai</b></p>
        @foreach($kriteria as $c)
            <label for="">{{ $c->name }}</label>
            <input type="number" name="{{ 'score'. $c->id }}" class="form-control mb-2">
        @endforeach

        <br>
           <center>
               <a href="/hasil" style="width: 200px;" class="btn btn-dark">Simpan Nilai</a>
           </center>
           <br>
     </form>
@endsection
