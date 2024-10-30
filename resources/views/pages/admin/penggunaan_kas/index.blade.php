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
        class="btn btn-primary" title="Tambah"><i class="fa fa-plus">Tambah</i></a><br><br><br>
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
            <td style="text-align: right">{{ $key->pagu != '' ? number_format($key->pagu) : '' }} </td>
            <td style="text-align: center">
                <a href="{{ route('penggunaan_kas.show', ['penggunaan_ka' => $key->id]) }}" class="btn btn-default" target="_blank">Lihat</a>
            </td>
            <td style="text-align: center">
                <a href="#" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i>Edit</a>
                <a href="#" class="btn btn-danger" title="Hapus"><i class="fa fa-eraser"></i>Hapus</a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection