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
		<h5>Hasil Tes Penerimaan Siswa Baru SMK PGRI Jatibarang</h4>
		</center>
<br>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Ranking</th>
				<th>Nama</th>
				<th>Jurusan</th>
				<th>Nilai Akhir</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
            @foreach($nilaiakhir as $i => $d)
			<tr>
				<td>{{ $i+1 }}</td>
                    <td>{{ $d->alternatif->name }}</td>
                    <td>{{ $d->alternatif->jurusan }}</td>
                    <td>{{ $d->nilai_akhir }}</td>

			</tr>
			@endforeach

		</tbody>
	</table>

</body>
</html>
