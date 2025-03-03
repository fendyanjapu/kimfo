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
</h2><br>
<a href="{{ route('capaianKinerja.create') }}"
      class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"></i>Tambah</i></a>
<table id="tabel" class="table table-striped table-bordered">
    <thead>
     <tr>
      <th style="vertical-align: middle; text-align: center" width="15px">No</th>
      <th style="vertical-align: middle; text-align: center">Indikator Kinerja</th>
      <th style="vertical-align: middle; text-align: center">Bulan</th>
      <th style="vertical-align: middle; text-align: center">Jumlah Capaian</th>
      <th style="vertical-align: middle; text-align: center">Bukti Capaian</th>
      <th style="vertical-align: middle; text-align: center" width="15px">#</th>
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
        <td style="text-align: center">
            {{-- <a href="{{ route('capaianKinerja.edit', ['capaianKinerja' => $item]) }}" class="btn btn-success btn-sm mt-1" title="edit"><i class="icon-pencil"></i></a> --}}

            <a href="{{ route('capaianKinerja.destroy', $item) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
              <i class="icon-trash"></i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
