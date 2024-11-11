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
      <div class="par-text">Uraian Subkegiatan</div>
      <div class="par-tex2">
  </h2><br>
  <a href="{{ route('uraian_subkegiatan.create') }}"
        class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"></i>Tambah</a>
  <table id="tabel" class="table table-striped table-bordered" >
    <thead>
      <tr>
        <th style="vertical-align: middle; text-align: center" width="15px">NO</th>
        <th style="vertical-align: middle; text-align: center">Kode Rekening</th>
        <th style="vertical-align: middle; text-align: center">Subkegiatan</th>
        <th style="vertical-align: middle; text-align: center">Uraian</th>
        <th style="vertical-align: middle; text-align: center">Kode Rekening</th>
        <th style="vertical-align: middle; text-align: center">Pagu</th>
        <th style="vertical-align: middle; text-align: center" width="15px">#</th>
       </tr>

    </thead>
    <tbody>
     @foreach ($data as $key)
        <tr>
            <td style="text-align: center">{{ $loop->iteration }}</td>
            <td> {{ $key->kode_rekening }}</td>
            <td>
                {{ $key->subkegiatan ? $key->subkegiatan->subkegiatan : '' }}
           </td>
            <td> {{ $key->uraian }} </td>
            <td> {{ $key->kode_rekening }} </td>
            <td style="text-align: right">
                {{ $key->pagu != '' ? "Rp " . number_format($key->pagu) : '' }}
            </td>
                <td style="text-align: center">
                    <a href="{{ route('uraian_subkegiatan.edit', $key->id_uraian_subkegiatan) }}" class="btn btn-success btn-sm" title="Edit"><i class="icon-pencil"></i></a>

                    <a href="{{ route('uraian_subkegiatan.destroy', $key->id_uraian_subkegiatan) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
                        <i class="icon-trash"></i>
                    </a>
                </td>
            </td>
        </tr>
     @endforeach
    </tbody>
  </table>

@endsection
