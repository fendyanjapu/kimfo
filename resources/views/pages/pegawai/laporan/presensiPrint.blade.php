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
			case '01':
				$bln = 'JANUARI';
				break;
			case '02':
				$bln = 'FEBRUARI';
				break;
			case '03':
				$bln = 'MARET';
				break;
			case '04':
				$bln = 'APRIL';
				break;
			case '05':
				$bln = 'MEI';
				break;
			case '06':
				$bln = 'JUNI';
				break;
			case '07':
				$bln = 'JULI';
				break;
			case '08':
				$bln = 'AGUSTUS';
				break;
			case '09':
				$bln = 'SEPTEMBER';
				break;
			case '10':
				$bln = 'OKTOBER';
				break;
			case '11':
				$bln = 'NOVEMBER';
				break;
			case '12':
				$bln = 'DESEMBER';
				break;
			default:
			  	$bln = '';
				break;
		}
	?>

	<?php
		if (auth()->user()->jabatan_id == 20) {
			$judul = 'PPT/NON ASN PENDUKUNG TENAGA AHLI';
		} elseif (auth()->user()->jabatan == 21) {
			$judul = 'THL';
		} else {
			$judul = 'ASN';
		}
		
	?>

	<center>
		<h4>DAFTAR ABSENSI {{ $judul }}</h4>
		<h4>DINAS KOMUNIKASI DAN INFORMATIKA</h4>
		<h4>KABUPATEN BARITO KUALA</h4>
		<h4>UNTUK BULAN {{ $bln }}</h4>
	</center>

	<table>
		<tr>
			<td>Nama</td>
			<td> : </td>
			<td>{{ auth()->user()->nama }}</td>
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
					<td style="height: 15">{{ $i }}</td>
					<td style="height: 15">{{ $i.'-'.$month.'-'.date('y') }}</td>
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
					<td style="{{ $color }}">{{ $jam_masuk[$i] }}</td>
					<td style="{{ $color }}">{{ $jam_pulang[$i] }}</td>
					<td style="{{ $color }}"></td>
				</tr>
			@endfor
		</tbody>
	</table>
	<br>
	<table>
		<tr>
			<td style="width: 450px"></td>
			<td style="text-align: center">{{ $jabatan_atasan }}</td>
		</tr>
		<br>
		<br>
		<br>
		<br>
		<tr>
			<td style="width: 400px"></td>
			<td style="text-align: center"><u>{{ $nama_atasan }}</u></td>
		</tr>
		<tr>
			<td style="width: 400px"></td>
			<td style="text-align: center">NIP. {{ $nip_atasan }}</td>
		</tr>
	</table>
</body>

</html>