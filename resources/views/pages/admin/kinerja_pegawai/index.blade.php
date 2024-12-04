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
      <div class="par-text">Kinerja Pegawai</div>
      <div class="par-tex2">
  </h2><br>
  <a href="{{ route('kinerja_pegawai.create') }}"
    class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"> Tambah</i></a>
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
              <?= $key->user->nama ?> <br>
              <?= $key->user->nip ?>
            </td>
            <td style="width:20%"><?= $key->kinerja_harian ?></td>
            <td style="width:20%"><?= $key->target_bulanan ?></td>
            <td style="width:20%"><?= $key->iku_bidang ?></td>
            <td style="width:10%"><?= date('d-m-Y', STRTOTIME($key->tgl_input)) ?></td>
                <td style="text-align: center">
                   
                        {{-- <?php if(Session::get('level') == 'Pegawai') : ?> --}}
                          <a href="{{ route('kinerja_pegawai.edit', ['kinerja_pegawai' => $key->id]) }}" class="btn btn-success btn-sm mt-1" title="edit"><i class="icon-pencil"></i></a>
                        {{-- <?php endif ?> --}}
    
                        <a href="{{ route('kinerja_pegawai.show', ['kinerja_pegawai' => $key->id]) }}" class="btn btn-warning btn-sm mt-1" title="print" target="_blank">
                        <i class="icon-print" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('kinerja_pegawai.destroy', $key->id) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
                          <i class="icon-trash"></i>
                        
                </td>
          </tr>
        @endforeach
     
    </tbody>
  </table>
@endsection