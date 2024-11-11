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
              <?= $key->pegawai->nama ?> <br>
              <?= $key->pegawai->nip ?>
            </td>
            <td style="width:20%"><?= $key->kinerja_harian ?></td>
            <td style="width:20%"><?= $key->target_bulanan ?></td>
            <td style="width:20%"><?= $key->iku_bidang ?></td>
            <td style="width:10%"><?= date('d-m-Y', STRTOTIME($key->tgl_input)) ?></td>
                <td style="text-align: center">
                   
                        {{-- <?php if(Session::get('level') == 'Pegawai') : ?> --}}
                          <a href="{{ route('kinerja_pegawai.edit', ['kinerja_pegawai' => $key->id]) }}" class="btn btn-success" title="edit"><i class="fa fa-pencils"></i>Edit</a>
                        {{-- <?php endif ?> --}}
    
                        <a href="#" class="btn btn-warning" title="Print" target="_blank">
                        <i class="fa fa-print" aria-hidden="true">Cetak</i>
                        </a>
                        <form action="{{ route('kinerja_pegawai.destroy', ['kinerja_pegawai' => $key->id]) }}" method="POST">
                          @csrf
                          <button class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-eraser"> Hapus</i></button>
                          @method('delete')
                        </form>
                        
                </td>
          </tr>
        @endforeach
     
    </tbody>
  </table>
@endsection