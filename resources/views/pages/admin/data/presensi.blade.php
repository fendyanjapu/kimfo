@extends('layouts.template')

@section('content')
    {{-- <script>
        $(document).ready(function () {
            $('#tabel').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
                }
            });
        });
    </script> --}}
    <h2>
        <div class="par-text">Data Presensi</div>
    </h2>
    <br><br>
    <form action="">
        <div class="form-group row mt-3">
            <label class="col-sm-2 control-label" style="text-align: right">Nama Pegawai</label>
            <div class="col-sm-4">
                <select name="pegawai" id="pegawai" class="form-control">
                    <option></option>
                    @foreach ($pegawais as $pegawai)
                        <option value="{{ $pegawai->id }}" {{ $pegawai->id == $pegawai_id ? 'selected' : '' }}>
                            {{ $pegawai->nama }}
                        </option>
                    @endforeach
                </select>
                
            </div>
        </div>
        <div class="form-group row mt-3">
            <label class="col-sm-2 control-label" style="text-align: right">Bulan</label>
            <div class="col-sm-4">
                <select name="bulan" id="bulan" class="form-control">
                    <option></option>
                    <option value="01" {{ $bulan == '01' ? 'selected' : '' }}>Januari</option>
                    <option value="02" {{ $bulan == '02' ? 'selected' : '' }}>Februari</option>
                    <option value="03" {{ $bulan == '03' ? 'selected' : '' }}>Maret</option>
                    <option value="04" {{ $bulan == '04' ? 'selected' : '' }}>April</option>
                    <option value="05" {{ $bulan == '05' ? 'selected' : '' }}>Mei</option>
                    <option value="06" {{ $bulan == '06' ? 'selected' : '' }}>Juni</option>
                    <option value="07" {{ $bulan == '07' ? 'selected' : '' }}>Juli</option>
                    <option value="08" {{ $bulan == '08' ? 'selected' : '' }}>Agustus</option>
                    <option value="09" {{ $bulan == '09' ? 'selected' : '' }}>September</option>
                    <option value="10" {{ $bulan == '10' ? 'selected' : '' }}>Oktober</option>
                    <option value="11" {{ $bulan == '11' ? 'selected' : '' }}>November</option>
                    <option value="12" {{ $bulan == '12' ? 'selected' : '' }}>Desember</option>
                </select>
                
            </div>
        </div>
        <div class="form-group row mt-3">
            <label class="col-sm-2 control-label" style="text-align: right"></label>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Submit</button>
            </div>
        </div>
        
    </form>
    <br>
    <table id="tabel" class="table table-bordered">
        <thead>
            <tr>
                <th style="vertical-align: middle; text-align: center" width="5px">NO</th>
                <th style="vertical-align: middle; text-align: center">Tanggal</th>
                <th style="vertical-align: middle; text-align: center">Jam Masuk</th>
                <th style="vertical-align: middle; text-align: center">Jam Pulang</th>
            </tr>

        </thead>
        <tbody>
            @for ($i = 1; $i <= $jumlahHari; $i++)
				<tr style="text-align: center;">
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
						foreach ($hariLibur as $key) {
							if ($key->tanggal_libur == $tgl) {
								$color = 'background-color: grey';
							}
						}
					?>
					<td style="{{ $color }}">{{ isset($jam_masuk[$i]) != null ? $jam_masuk[$i] : '' }}</td>
					<td style="{{ $color }}">{{ isset($jam_pulang[$i]) != null ? $jam_pulang[$i] : '' }}</td>
				</tr>
			@endfor
        </tbody>
    </table>

    <script>
        $(function(){
		 $("#pegawai").select2();
		}); 
    </script>

@endsection