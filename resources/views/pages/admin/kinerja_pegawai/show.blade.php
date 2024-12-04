<!DOCTYPE html>
<html>
<head>
	<title>KIMFO</title>
	@include('includes.style')

	<style>
		.tabel {
			width: 100%;
			border-left: 0.01em solid #ccc;
			border-right: 0;
			border-top: 0.01em solid #ccc;
			border-bottom: 0;
			border-collapse: collapse;
		}
		.tabel td,
		.tabel th {
			border-left: 0;
			border-right: 0.01em solid #ccc;
			border-top: 0;
			border-bottom: 0.01em solid #ccc;
		}
	</style>
</head>
<body>
	
	<center>
		<h1>Kinerja Pegawai</h1>
	</center>

	<table>
		<tr>
			<td>NIP</td>
			<td> : </td>
			<td>{{ $kinerja_pegawai->user->nip }}</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td> : </td>
			<td>{{ $kinerja_pegawai->user->nama }}</td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td> : </td>
			<td>{{ $kinerja_pegawai->user->jabatan }}</td>
		</tr>
	</table>

	<br>
 
	<table class='tabel'>
		<thead>
			<tr>
				<th>Kinerja Harian</th>
				<th>Target Bulanan</th>
				<th>IKU Bidang</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $kinerja_pegawai->kinerja_harian }}</td>
				<td>{{ $kinerja_pegawai->target_bulanan }}</td>
				<td>{{ $kinerja_pegawai->iku_bidang }}</td>
			</tr>
		</tbody>
	</table>
 
</body>
</html>