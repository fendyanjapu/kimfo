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
      <div class="par-text">Kinerja Pegawai {{ Session::get('level') }}</div>
      <div class="par-tex2">
  </h2><br>
  <a href="{{ route('kinerja_pegawai.create') }}"
        class="btn btn-primary" title="Tambah"><i class="fa fa-plus">Tambah</i></a><br><br><br>
  <table id="tabel" class="table table-striped table-bordered" >
    <thead>
      <tr>
        <th style="vertical-align: middle; text-align: center" width="15px">NO</th>
        <th style="vertical-align: middle; text-align: center">Pegawai</th>
        <th style="vertical-align: middle; text-align: center">Kinerja Harian</th>
        <th style="vertical-align: middle; text-align: center">Target Bulanan</th>
        <th style="vertical-align: middle; text-align: center">Iku Bidang</th>
        <th style="vertical-align: middle; text-align: center">Tgl Input</th>
        <th style="vertical-align: middle; text-align: center" width="15px">#</th>
       </tr>
       
    </thead>
    <tbody>
        @foreach ($query as $key)
        <tr>
            <td style="text-align: center" style="width:1%">{{ $loop->iteration }}</td>
            <td style="width:20%">
              <?= $key->nama ?> <br>
              <?= $key->nip ?>
            </td>
            <td style="width:20%"><?= $key->kinerja_harian ?></td>
            <td style="width:20%"><?= $key->target_bulanan ?></td>
            <td style="width:20%"><?= $key->iku_bidang ?></td>
            <td style="width:10%"><?= date('d-m-Y', STRTOTIME($key->tgl_input)) ?></td>
                <td style="text-align: center">
                   
                        {{-- <?php if($this->session->nip) : ?>
                          <a href="<?= base_url('kinerja_pegawai/edit/'.$key->id_kinerja) ?>" class="btn btn-second" title="edit"><i class="fa fa-pencils"></i>Edit</a>
                        <?php endif ?>
    
                        <a href="<?php echo base_url('kinerja_pegawai/cetak/'.$key->id_kinerja) ?>" class="btn btn-warning" title="Print" target="_blank">
                        <i class="fa fa-print" aria-hidden="true">Cetak</i>
                        <?php if($this->session->level == 'admin') : ?>
                        <a href="<?= base_url('kinerja_pegawai/hapus/'.$key->id_kinerja) ?>" class="btn btn-danger" title="Hapus"><i class="fa fa-eraser"></i>Hapus</a>
                        <?php endif ?> --}}
                </td>
          </tr>
        @endforeach
     
    </tbody>
  </table>
@endsection