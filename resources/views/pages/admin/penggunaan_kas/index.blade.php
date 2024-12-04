@extends('layouts.template')

@section('content')
<script>
    $(document).ready(function(){
      $('#tabel').DataTable( {
         "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
          } 
      } );
    });
  </script>
  <h2>
      <div class="par-text">Penggunaan Kas / Bukti Kegiatan</div>
      <div class="par-tex2">
  </h2><br>
  <a href="{{ route('penggunaan_kas.create') }}"
        class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"> Tambah</i></a>
  <table id="tabel" class="table table-striped table-bordered" >
    <thead>
       <tr>
        <th style="vertical-align: middle; text-align: center">No</th>
        <th style="vertical-align: middle; text-align: center">Subkegiatan</th>
        <th style="vertical-align: middle; text-align: center">Uraian</th>
        <th style="vertical-align: middle; text-align: center">Bulan</th>
        <th style="vertical-align: middle; text-align: center">Pagu (Keuangan)</th>
        <th style="vertical-align: middle; text-align: center">Bukti Kegiatan</th>
        <th style="vertical-align: middle; text-align: center">#</th>
       </tr>
    </thead>
    <tbody>
        @foreach ($penggunaan_kas as $key)
        <tr>
            <td style="text-align: center">{{ $loop->iteration }}</td>
            <td>{{ $key->subkegiatan->subkegiatan }}</td>
            <td>{{ $key->uraian_subkegiatan->uraian }}</td>
            <td style="text-align: center">{{ $key->bulan }}</td>
            <td style="text-align: right">{{ $key->pagu != '' ? "Rp ".number_format($key->pagu) : '' }} </td>
            <td style="text-align: center">
                <a href="{{ route('penggunaan_kas.show', ['penggunaan_ka' => $key->id]) }}" class="btn btn-secondary btn-sm mt-1" target="_blank" title="lihat"><i class="icon-eye-open"></i></a>
            </td>
            <td style="text-align: center">
                <a href="{{ route('penggunaan_kas.edit', ['penggunaan_ka' => $key->id]) }}" class="btn btn-success btn-sm mt-1" title="edit"><i class="icon-pencil"></i></a>
                <a href="{{ route('penggunaan_kas.destroy', $key->id) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
                  <i class="icon-trash"></i>
              </a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection