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
@if ($id_user < 6)
  <a href="{{ route('indikator.create') }}"
    class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"></i>Tambah</i></a>
@endif

<table id="tabel" class="table table-striped table-bordered">
    <thead>
     <tr>
      <th style="vertical-align: middle; text-align: center" width="15px">No</th>
      <th style="vertical-align: middle; text-align: center">Sasaran</th>
      <th style="vertical-align: middle; text-align: center">Indikator</th>
      @if ($id_user < 6)
        <th style="vertical-align: middle; text-align: center" width="15px">#</th>
      @endif
      
     </tr>
  </thead>
  <tbody>
    @foreach ($indikators as $item)
    <tr>
        <td style="text-align: center;width:1%">{{ $loop->iteration }}</td>
        <td style="text-align: center;">{{ $item->sasaran->nama_sasaran }}</td>
        <td style="text-align: center;">{{ $item->nama_indikator }}</td>
        @if ($id_user < 6)
          <td style="text-align: center">
            <a href="{{ route('indikator.edit', ['indikator' => $item->id]) }}" class="btn btn-success btn-sm mt-1" title="edit"><i class="icon-pencil"></i></a>

            <a href="{{ route('indikator.destroy', $item->id) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
              <i class="icon-trash"></i>
          </a>
        </td>
        @endif
        
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
