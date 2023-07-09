@extends('sb-admin/app')
@section('title','Penilaian')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Nilai Siswa</h1>

    <form action="/hitung-penilaian" method="POST">
       @csrf
       <div class="form-group">
        <label for="nama">Nama</label>
        <select class="form-control" id="name" name='name'>
            <option value=""></option>
            @foreach ($alternatif as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <select class="form-control" id="jurusan" name='jurusan'>
            <option value=""></option>
            @foreach ($alternatif as $item)
            <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
            @endforeach
        </select>
        @error('jurusan')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="asalsekolah">Asal Sekolah</label>
        <select class="form-control" id="asalsekolah" name='asalsekolah'>
            <option value=""></option>
            @foreach ($alternatif as $item)
            <option value="{{ $item->id }}">{{ $item->asalsekolah }}</option>
            @endforeach
        </select>
        @error('asalsekolah')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <p><b>Masukan Nilai</b></p>
    @foreach($kriteria as $k)
    <div class="form-group">
        <label for="score{{ $k->id }}">{{ $k->name }}</label>
        <input type="number" class="form-control" id="score{{ $k->id }}" name="{{ 'score'. $k->id }}">
    </div>
    @endforeach


        <br>
           <center>
               <input type="submit" style="width: 200px;" class="btn btn-dark" value="Simpan Nilai">
           </center>
           <br>
     </form>
@endsection
