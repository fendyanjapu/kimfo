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
    <div class="par-text">Data Sasaran dan Indikator Kinerja</div>
    <div class="par-tex2">
</h2><br>
<a href="{{ route('sasaran-utama.create') }}"
      class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"></i>Tambah</i></a>
<table id="tabel" class="table table-striped table-bordered">
    <thead>
     <tr>
      <th style="vertical-align: middle; text-align: center" width="15px">No</th>
      <th style="vertical-align: middle; text-align: center">Sasaran Strategis</th>
      <th style="vertical-align: middle; text-align: center">Indikator Kinerja</th>
      <th style="vertical-align: middle; text-align: center">Target</th>
      
      <th style="vertical-align: middle; text-align: center" width="15px">#</th>
     </tr>
  </thead>
  <tbody>
    @foreach ($sasarans as $item)
    <tr>
        <td style="text-align: center;width:1%">{{ $loop->iteration }}</td>
        <td style="text-align: center;">{{ $item->sasaran_strategis }}</td>
        <td style="text-align: center;">{{ $item->indikator_kinerja }}</td>
        <td style="text-align: center;">{{ $item->target." ".$item->satuan }}</td>
        <td style="text-align: center">
            <a href="{{ route('sasaran-utama.edit', ['sasaran_utama' => $item->id]) }}" class="btn btn-success btn-sm mt-1" title="edit"><i class="icon-pencil"></i></a>

            <a href="{{ route('sasaran-utama.destroy', $item->id) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
              <i class="icon-trash"></i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
