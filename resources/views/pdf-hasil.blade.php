<!DOCTYPE html>
<html>
<head>
	<title>Hasil Tes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>HASIL TES PENERIMAAN SISWA BARU <br> SMK PGRI JATIBARANG</h4>
	</center>
<br>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th scope="col">Ranking</th>
				<th scope="col">Nama</th>
				<th scope="col">Jurusan</th>
                <th scope="col">Asal Sekolah</th>
				<th scope="col">Nilai Akhir</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
            @foreach($nilaiakhir as $i => $d)
			<tr>
				<td>{{ $i+1 }}</td>
                    <td>{{ $d->alternatif->name }}</td>
                    <td>{{ $d->alternatif->jurusan }}</td>
                    <td>{{ $d->alternatif->asalsekolah }}</td>
                    <td>{{ $d->nilai_akhir }}</td>

			</tr>
			@endforeach

		</tbody>
	</table>

</body>
</html>
