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
			border: 1px solid black;
  			border-collapse: collapse;
			text-align: center;
			padding: 5px;
		}

		h4 {
			margin: 2px;
		}

		.page-break {
			page-break-after: always;
		}

		.center {
			margin: auto;
			width: 60%;
			border: 3px solid #73AD21;
			padding: 10px;
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

	<center>
		<h2>LAPORAN BULANAN PEKERJAAN</h2>
	</center>

	<table>
		<tr>
			<td><b>Identitas Jabatan</b></td>
			<td></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td> : </td>
			<td>{{ auth()->user()->nama }}</td>
		</tr>
		@if (auth()->user()->jabatan_id == 20)
			<tr>
				<td>Jabatan</td>
				<td> : </td>
				<td>{{ auth()->user()->jabatan_tekon }}</td>
			</tr>
		@endif
	</table>

	<br>
	<h4>Laporan Pekerjaan Bulan {{ ucfirst(strtolower($bln)) }} {{ date('Y') }}</h4>
	<br>

	<table class='tabel'>
		<thead>
			<tr>
				<th>TANGGAL</th>
				<th>JAM</th>
				<th>KEGIATAN</th>
				<th>KET. HASIL</th>
			</tr>

		</thead>
		<tbody style="page-break-inside: avoid;">
			@for ($i = 1; $i <= $jumlahHari; $i++)
				<?php 
					$num_padded = sprintf("%02d", $i);
					$tgl = date('Y')."-".$bulan."-".$num_padded;
					$hari = date_format(date_create($tgl), 'l');
					if ($hari == 'Saturday' || $hari == 'Sunday') {
						$color = 'background-color: #FBCEB1';
						$ket = 'Libur';
					} else {
						$color = '';
						$ket = '';
					}
					foreach ($hariLibur as $key) {
						if ($key->tanggal_libur == $tgl) {
							$color = 'background-color: #FBCEB1';
							$ket = 'Libur';
						}
					}
				?>

				@if ($jml_tgl[$i] > 0)
					<?php $j = 1; ?>
					@foreach ($kinerjas as $item)
						@if ($item->tgl_input == $tgl)
							<?php $ket = 'Selesai'; ?>
							@if ($j == 1)
							<tr style="{{ $color }}">
								<td rowspan="{{ $jml_tgl[$i] }}">{{ $i." ".$bln }}</td>
								<td>{{ $item->jam_awal }}-{{ $item->jam_akhir }}</td>
								<td style="text-align: left">{{ $item->kinerja_harian }}</td>
								<td>{{ $ket }}</td>
							</tr>
							@else
							<tr style="{{ $color }}">
								<td>{{ $item->jam_awal }}-{{ $item->jam_akhir }}</td>
								<td style="text-align: left">{{ $item->kinerja_harian }}</td>
								<td>{{ $ket }}</td>
							</tr>
							@endif
							<?php $j++ ?>
						@endif
						<?php
						    if ($foto1 == $item->id) {
								$img1 = $item->bukti_kegiatan;
								$ket1 = $item->kinerja_harian;
							}
							if ($foto2 == $item->id) {
								$img2 = $item->bukti_kegiatan;
								$ket2 = $item->kinerja_harian;
							}
							if ($foto3 == $item->id) {
								$img3 = $item->bukti_kegiatan;
								$ket3 = $item->kinerja_harian;
							}
							if ($foto4 == $item->id) {
								$img4 = $item->bukti_kegiatan;
								$ket4 = $item->kinerja_harian;
							}
						?>
					@endforeach
				@else
					<tr style="{{ $color }}">
						<td>{{ $i." ".$bln }}</td>
						<td></td>
						<td></td>
						<td>{{ $ket }}</td>
					</tr>
				@endif
			@endfor
		</tbody>
	</table>
	
	<div class="page-break"></div>

	<H5>RANGKUMAN KEGIATAN BULAN {{ $bln }} {{ date('Y') }}</H5>
	<p>Selama bulan {{ strtolower($bln) }} {{ date('Y') }} adapun rangkuman kegiatan yang dilaksanakan yaitu sebagai berikut:</p>
	<?php $no = 0 ?>
	@foreach ($sasarans as $sasaran)
		<p>{{ ++$no }}. {{ $sasaran->nama_sasaran }}</p>
	@endforeach
	<p>{{ ++$no }}. Tugas Lainnya</p>
	<br><br>
	<table>
		<tr>
			<td style="text-align: center;">Mengetahui,</td>
			<td style="width: 200px"></td>
			<td style="text-align: center">Dibuat Oleh,</td>
		</tr>
		<tr>
			<td style="text-align: center">{{ ucwords(strtolower($jabatan_atasan)) }}</td>
		</tr>
		<br>
		<br>
		<br>
		<br>
		<tr>
			<td style="text-align: center"><u>{{ $nama_atasan }}</u></td>
			<td"></td>
			<td style="text-align: center">{{ auth()->user()->nama }}</td>
		</tr>
		<tr>
			<td style="text-align: center">NIP. {{ $nip_atasan }}</td>
			<td"></td>
			<td style="text-align: center">{{ auth()->user()->nip != '-' ? auth()->user()->nip : '' }}</td>
		</tr>
	</table>
	
	<div class="page-break"></div>
		
	<h5 style="text-align: center">FOTO HASIL KEGIATAN SELAMA BULAN {{ $bln }} {{ date('Y') }}</h5>
	<br>

	<table class="center">
		<tr>
			<td><img src="upload/bukti_kegiatan/{{ $img1 }}" width="250px" height="250px" alt=""></td>
			<td style="width: 50px"></td>
			<td><img src="upload/bukti_kegiatan/{{ $img2 }}" width="250px" height="250px" alt=""></td>
		</tr>
		<tr>
			<td style="text-align: center">{{ $ket1 }}</td>
			<td></td>
			<td style="text-align: center">{{ $ket2}}</td>
		</tr>
		<br>
		<tr>
			<td><img src="upload/bukti_kegiatan/{{ $img3 }}" width="250px" height="250px" alt=""></td>
			<td></td>
			<td><img src="upload/bukti_kegiatan/{{ $img4 }}" width="250px" height="250px" alt=""></td>
		</tr>
		<tr>
			<td style="text-align: center">{{ $ket3 }}</td>
			<td></td>
			<td style="text-align: center">{{ $ket4 }}</td>
		</tr>
	</table>
	
</body>

</html>