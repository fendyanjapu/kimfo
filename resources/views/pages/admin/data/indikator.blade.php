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
    <div class="par-text">Data Indikator</div>
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
      <th style="vertical-align: middle; text-align: center">Sasaran</th>
      <th style="vertical-align: middle; text-align: center">Indikator</th>
      <th style="vertical-align: middle; text-align: center">Target</th>
      <th style="vertical-align: middle; text-align: center">Satuan</th>
      <th style="vertical-align: middle; text-align: center">Target Waktu</th>
      
     </tr>
  </thead>
  <tbody>
    @foreach ($indikators as $item)
    <tr>
        <td style="text-align: center;width:1%">{{ $loop->iteration }}</td>
        <td>{{ $item->sasaran?->nama_sasaran }}</td>
        <td>{{ $item->nama_indikator }}</td>
        <td style="text-align: center;">{{ $item->target }}</td>
        <td style="text-align: center;">{{ $item->satuan }}</td>
        <td style="text-align: center;">
          @if ($item->target_waktu_id == 3)
          {{ $item->targetWaktu->target_waktu." (".$item->dari_bulan." - ".$item->sampai_bulan.")" }}
          @else
          {{ $item->targetWaktu->target_waktu }}
          @endif
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
