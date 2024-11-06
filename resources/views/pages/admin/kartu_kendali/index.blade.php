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
      <div class="par-tex2">
  </h2><br>
  <table id="tabel" class="table table-striped table-bordered" >
    <thead>
      <tr>
        <th style="vertical-align: middle; text-align: center" width="15px">NO</th>
        <th style="vertical-align: middle; text-align: center">Kode Rekening</th>
        <th style="vertical-align: middle; text-align: center">Subkegiatan</th>
        <th style="vertical-align: middle; text-align: center">Uraian</th>
        <th style="vertical-align: middle; text-align: center" width="15px">#</th>
       </tr>
       
    </thead>
    <tbody>
      @foreach ($query as $key)
        <tr>
            <td style="text-align: center"><?= $loop->iteration ?></td>
            <td><?= $key->kode_rekening ?></td>
            <td><?= $key->subkegiatan->subkegiatan ?></td>
            <td><?= $key->uraian ?></td>
                <td style="text-align: center">
                    <a href="#" class="btn btn-warning" title="Print" target="_blank">
                        <i class="fa fa-print" aria-hidden="true">Cetak</i>
                    
                </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection