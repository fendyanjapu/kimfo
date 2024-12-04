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
		<h1>Kartu Kendali</h1>
	</center>

	<?php

		$bulan = date('n');
	    switch ($bulan) {
          case 1:
            $month = "Januari";
            break;
          case 2:
            $month = "Februari";
            break;
          case 3:
            $month = "Maret";
            break;
        case 4:
            $month = "April";
            break;
        case 5:
            $month = "Mei";
            break;
        case 6:
            $month = "Juni";
            break;
        case 7:
            $month = "Juli";
            break;
        case 8:
            $month = "Agustus";
            break;
        case 9:
            $month = "September";
            break;
        case 10:
            $month = "Oktober";
            break;
        case 11:
            $month = "November";
            break;
        case 12:
            $month = "Desember";
            break;
          default:
            $month = "";
        }

	?>

	<table>
		<tr>
			<td>Program</td>
			<td> : </td>
			<td>{{ $uraian_subkegiatan->program->program }}</td>
		</tr>
		<tr>
			<td>No Rek Kegiatan</td>
			<td> : </td>
			<td>{{ $uraian_subkegiatan->kegiatan->kegiatan_kode.".".$uraian_subkegiatan->kode_rekening }}</td>
		</tr>
		<tr>
			<td>Per Tanggal</td>
			<td> : </td>
			<td>{{ date('d').' '.$month.' '.date('Y') }}</td>
		</tr>
	</table>

	<br>
 
	<table class='tabel'>
		<thead>
			<tr>
				<th>No</th>
				<th>Uraian</th>
				<th>Pagu (RP)</th>
				<th>Bulan Lalu (RP)</th>
				<th>Bulan Ini (RP)</th>
				<th>Sisa (RP)</th>
				<th>Ket</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="text-align: center">1</td>
				<td>{{ $uraian_subkegiatan->uraian }}</td>
				<td style="text-align: right">{{ number_format($uraian_subkegiatan->pagu) }}</td>
				<td style="text-align: right">{{ number_format($penggunaan_kas_bulan_lalu) }}</td>
				<td style="text-align: right">{{ number_format($penggunaan_kas_bulan_ini) }}</td>
				<td style="text-align: right">
					<?php 
						$sisa = $uraian_subkegiatan->pagu - $penggunaan_kas;
						echo number_format($sisa);
					?>
				</td>
				<td></td>
			</tr>
		</tbody>
	</table>
 
</body>
</html>