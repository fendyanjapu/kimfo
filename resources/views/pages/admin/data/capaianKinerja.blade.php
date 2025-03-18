@extends('layouts.template')

@section('content')
<script>
  $(document).ready(function(){
    $('#tabel').DataTable( {
        scrollX: true,
        scrollY: true,
       "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
        }
    } );
  });
</script>
<h2>
    <div class="par-text">Capaian Kinerja</div>
    <div class="par-tex2">
</h2><br><br>

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

<table id="tabel" class="table table-striped table-bordered">
    <thead>
     <tr>
      <th style="vertical-align: middle; text-align: center" width="15px">No</th>
      <th style="vertical-align: middle; text-align: center">Indikator Kinerja</th>
      <th style="vertical-align: middle; text-align: center">Bulan</th>
      <th style="vertical-align: middle; text-align: center">Jumlah Capaian</th>
      <th style="vertical-align: middle; text-align: center">Bukti Capaian</th>
     </tr>
  </thead>
  <tbody>
    @foreach ($capaianKinerjas as $item)
    <tr>
        <td style="text-align: center;width:1%">{{ $loop->iteration }}</td>
        <td style="text-align: center;">{{ $item->indikator?->nama_indikator }}</td>
        <td style="text-align: center;">{{ strtoupper($item->bulan) }}</td>
        <td style="text-align: center;">{{ $item->jumlah }}</td>
        <td style="text-align: center; width:10%">
          <a href="{{ env('APP_URL').'upload/bukti_capaian/'.$item->bukti_capaian }}" class="btn btn-default btn-sm mt-1" title="lihat" target="_blank">
            <i class="icon-file" aria-hidden="true"></i>
          </a>
        </td>
        
      </tr>
    @endforeach
  </tbody>
</table>

<script>
    $(function(){
        $('#pegawai').select2();
    })
  </script>

@endsection
