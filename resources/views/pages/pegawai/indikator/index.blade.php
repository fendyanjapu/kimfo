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
</h2><br>
  <a href="{{ route('indikator.create') }}"
    class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"></i>Tambah</i></a>


<table id="tabel" class="table table-striped table-bordered">
    <thead>
     <tr>
      <th style="vertical-align: middle; text-align: center" width="15px">No</th>
      <th style="vertical-align: middle; text-align: center">Sasaran</th>
      <th style="vertical-align: middle; text-align: center">Indikator</th>
      <th style="vertical-align: middle; text-align: center">Target</th>
      <th style="vertical-align: middle; text-align: center">Satuan</th>
      <th style="vertical-align: middle; text-align: center">Target Waktu</th>
      <th style="vertical-align: middle; text-align: center" width="15px">#</th>
      
     </tr>
  </thead>
  <tbody>
    @foreach ($indikators as $item)
    <tr>
        <td style="text-align: center;width:1%">{{ $loop->iteration }}</td>
        <td style="text-align: center;">{{ $item->sasaran?->nama_sasaran }}</td>
        <td style="text-align: center;">{{ $item->nama_indikator }}</td>
        <td style="text-align: center;">{{ $item->target }}</td>
        <td style="text-align: center;">{{ $item->satuan }}</td>
        <td style="text-align: center;">
          @if ($item->target_waktu_id == 3)
          {{ $item->targetWaktu->target_waktu." (".$item->dari_bulan." - ".$item->sampai_bulan.")" }}
          @else
          {{ $item->targetWaktu->target_waktu }}
          @endif
        </td>
          <td style="text-align: center">
            <a href="{{ route('indikator.edit', ['indikator' => $item]) }}" class="btn btn-success btn-sm mt-1" title="edit"><i class="icon-pencil"></i></a>

            <a href="{{ route('indikator.destroy', $item) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
              <i class="icon-trash"></i>
          </a>
        </td>
        
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
