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
			text-align: center;
		}

		h4 {
			margin: 2px;
		}
	</style>
</head>

<body>

	<?php
		switch ($bulan) {
			case '03':
				$bln = 'MARET';
				break;
			
			default:
			  	$bln = '';
				break;
		}
	?>

	<center>
		<h4>DAFTAR ABSENSI PPT/NON ASN PENDUKUNG TENAGA AHLI</h4>
		<h4>DINAS KOMUNIKASI DAN INFORMATIKA</h4>
		<h4>KABUPATEN BARITO KUALA</h4>
		<h4>UNTUK BULAN {{ $bln }}</h4>
	</center>

	<table>
		<tr>
			<td>Nama</td>
			<td> : </td>
			<td>Noor rahmat effendy</td>
		</tr>
	</table>

	<table class='tabel'>
		<thead>
			<tr>
				<th>No</th>
				<th>Tgl/Bln/Thn</th>
				<th colspan="2">Jam Kerja</th>
				<th>Tanda Tangan</th>
			</tr>
			<tr>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>Masuk</td>
				<td>Pulang</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			@for ($i = 1; $i <= $jumlahHari; $i++)
				<tr>
					<td>{{ $i }}</td>
					<td>{{ $i.'-'.$month.'-'.date('y') }}</td>
					<?php 
						$num_padded = sprintf("%02d", $i);
						$tgl = date('Y')."-".$bulan."-".$num_padded;
						$hari = date_format(date_create($tgl), 'l');
						if ($hari == 'Saturday' || $hari == 'Sunday') {
							$color = 'background-color: grey';
						} else {
							$color = '';
						}
					?>
					<td style="{{ $color }}"></td>
					<td style="{{ $color }}"></td>
					<td style="{{ $color }}"></td>
				</tr>
			@endfor
		</tbody>
	</table>

</body>

</html>