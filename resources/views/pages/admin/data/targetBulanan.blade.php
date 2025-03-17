@extends('layouts.template')

@section('content')
  <script>
    $(document).ready(function () {
    $('#tabel').DataTable({
      scrollX: true,
      scrollY: true,
      "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
      }
    });
    });
  </script>
  <h2>
    <div class="par-text">Target Bulanan</div>
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
      <th style="vertical-align: middle; text-align: center">Indikator</th>
      <th style="vertical-align: middle; text-align: center">Target</th>
      <th style="vertical-align: middle; text-align: center">Satuan</th>
      <th style="vertical-align: middle; text-align: center">Januari</th>
      <th style="vertical-align: middle; text-align: center">Februari</th>
      <th style="vertical-align: middle; text-align: center">Maret</th>
      <th style="vertical-align: middle; text-align: center">April</th>
      <th style="vertical-align: middle; text-align: center">Mei</th>
      <th style="vertical-align: middle; text-align: center">Juni</th>
      <th style="vertical-align: middle; text-align: center">Juli</th>
      <th style="vertical-align: middle; text-align: center">Agustus</th>
      <th style="vertical-align: middle; text-align: center">September</th>
      <th style="vertical-align: middle; text-align: center">Oktober</th>
      <th style="vertical-align: middle; text-align: center">November</th>
      <th style="vertical-align: middle; text-align: center">Desember</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($targetBulanans as $item)
    <tr>
      <td style="text-align: center;width:1%">{{ $loop->iteration }}</td>
      
      <td style="text-align: center;">{{ $item->indikator?->nama_indikator }}</td>
      <td style="text-align: center;">{{ $item->indikator?->target }}</td>
      <td style="text-align: center;">{{ $item->indikator?->satuan }}</td>
      <td style="text-align: center;">{{ $item->jan }}</td>
      <td style="text-align: center;">{{ $item->feb }}</td>
      <td style="text-align: center;">{{ $item->mar }}</td>
      <td style="text-align: center;">{{ $item->apr }}</td>
      <td style="text-align: center;">{{ $item->mei }}</td>
      <td style="text-align: center;">{{ $item->jun }}</td>
      <td style="text-align: center;">{{ $item->jul }}</td>
      <td style="text-align: center;">{{ $item->agu }}</td>
      <td style="text-align: center;">{{ $item->sep }}</td>
      <td style="text-align: center;">{{ $item->okt }}</td>
      <td style="text-align: center;">{{ $item->nov }}</td>
      <td style="text-align: center;">{{ $item->des }}</td>

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