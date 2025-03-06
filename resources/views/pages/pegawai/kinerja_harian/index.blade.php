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
      <div class="par-text">Kinerja Harian</div>
      <div class="par-tex2">
  </h2><br>
  <a href="{{ route('kinerja_harian.create') }}"
    class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"> Tambah</i></a>
  <table id="tabel" class="table table-striped table-bordered" >
    <thead>
      <tr>
        <th style="vertical-align: middle; text-align: center" width="15px">NO</th>
        <th style="vertical-align: middle; text-align: center">Sasaran</th>
        <th style="vertical-align: middle; text-align: center">Indikator</th>
        <th style="vertical-align: middle; text-align: center">Kinerja Harian</th>
        <th style="vertical-align: middle; text-align: center">Jumlah</th>
        <th style="vertical-align: middle; text-align: center">Satuan</th>
        <th style="vertical-align: middle; text-align: center">Tanggal</th>
        <th style="vertical-align: middle; text-align: center">Jam</th>
        <th style="vertical-align: middle; text-align: center">Bukti Kegiatan</th>
        <th style="vertical-align: middle; text-align: center" width="15px">#</th>
       </tr>
       
    </thead>
    <tbody>
        @foreach ($query as $key)
        <tr>
            <td style="text-align: center" style="width:1%">{{ $loop->iteration }}</td>
            <td style="width:20%"><?= $key->sasaran?->nama_sasaran ?></td>
            <td style="width:20%"><?= $key->indikator?->nama_indikator ?></td>
            <td style="width:20%"><?= $key->kinerja_harian ?></td>
            <td style="width:20%; text-align: center"><?= $key->jumlah ?></td>
            <td style="width:20%; text-align: center"><?= $key->satuan ?></td>
            <td style="width:20%"><?= date('d-m-Y', STRTOTIME($key->tgl_input)) ?></td>
            <td style="width:20%"><?= $key->jam_awal." - ".$key->jam_akhir ?></td>
            <td style="text-align: center; width:10%">
              <a href="{{ env('APP_URL').'upload/bukti_kegiatan/'.$key->bukti_kegiatan }}" class="btn btn-default btn-sm mt-1" title="lihat" target="_blank">
                <i class="icon-picture" aria-hidden="true"></i>
              </a>
            </td>
                <td style="text-align: center">
                   
                        <a href="{{ route('kinerja_harian.edit', ['kinerja_harian' => $key->id]) }}" class="btn btn-success btn-sm mt-1" title="edit"><i class="icon-pencil"></i></a>
                        {{-- <a href="{{ route('kinerja_harian.show', ['kinerja_harian' => $key->id]) }}" class="btn btn-warning btn-sm mt-1" title="print" target="_blank">
                        <i class="icon-print" aria-hidden="true"></i>
                        </a> --}}
                        <a href="{{ route('kinerja_harian.destroy', $key->id) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
                          <i class="icon-trash"></i>
                        
                </td>
          </tr>
        @endforeach
     
    </tbody>
  </table>
@endsection