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
    <div class="par-text">Target Bulanan</div>
    <div class="par-tex2">
</h2><br>
<a href="{{ route('targetBulanan.create') }}"
      class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"></i>Tambah</i></a>
<table id="tabel" class="table table-striped table-bordered">
    <thead>
     <tr>
      <th style="vertical-align: middle; text-align: center" width="15px">No</th>
      <th style="vertical-align: middle; text-align: center" width="15px">#</th>
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
        <td style="text-align: center">
          <a href="{{ route('targetBulanan.edit', ['targetBulanan' => $item]) }}" class="btn btn-success btn-sm mt-1" title="edit"><i class="icon-pencil"></i></a>

          {{-- <a href="{{ route('targetBulanan.destroy', $item->id) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
            <i class="icon-trash"></i> --}}
        </a>
      </td>
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

@endsection
