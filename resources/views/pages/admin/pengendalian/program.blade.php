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
      <div class="par-text">Program</div>
      <div class="par-tex2">
  </h2><br>
  
          <table id="tabel" class="table table-striped table-bordered" >
    <thead>
      <tr>
        <th style="vertical-align: middle; text-align: center">NO</th>
        <th style="vertical-align: middle; text-align: center">Program</th>
        <th style="vertical-align: middle; text-align: center">Pagu</th>
        <th style="vertical-align: middle; text-align: center">Triwulan I</th>
        <th style="vertical-align: middle; text-align: center">Triwulan II</th>
        <th style="vertical-align: middle; text-align: center">Triwulan III</th>
        <th style="vertical-align: middle; text-align: center">Triwulan IV</th>
        
        <th style="vertical-align: middle; text-align: center">Sisa</th>
       </tr>
       
    </thead>
    <tbody>
        @foreach ($query as $key)
            <tr>
                <td style="vertical-align: middle; text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $key->program }}</td>
                <td>
                    <?php
                        $q = App\Models\uraian_subkegiatan::select('sum(pagu) as jumlah')->where('id_program', '=', $key->id_program)->first();
                        echo $q->jumlah;
                    ?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
      {{-- <?php
        $no = 0;
        foreach ($query->result() as $key):
      ?>
        <tr>
          <td style="text-align: center"><?= ++$no ?></td>
          <td><?= $key->program ?></td>
          <td style="text-align: right">
              <?php
                  $this->db->select('SUM(pagu) as jumlah');
                  $this->db->from('uraian_subkegiatan');
                  $this->db->where('id_program', $key->id_program);
                  $row = $this->db->get()->row();
                  $pagu = $row->jumlah;
                  echo $row->jumlah != '' ? "Rp ".number_format($pagu) : '';
              ?>
          </td>
          <td style="text-align: right">
              <?php
                  $this->db->where('id_program', $key->id_program);
                  $this->db->where('triwulan', 'i');
                  $queri = $this->db->get('rfk_realisasi');
                  $triwulan_i = 0;
                  foreach ($queri->result() as $row) {
                      $triwulan_i += $row->pagu;
                  }
                  echo "Rp ".number_format($triwulan_i);
              ?>
          </td>
          <td style="text-align: right">
              <?php
                  $this->db->where('id_program', $key->id_program);
                  $this->db->where('triwulan', 'ii');
                  $queri = $this->db->get('rfk_realisasi');
                  $triwulan_ii = 0;
                  foreach ($queri->result() as $row) {
                      $triwulan_ii += $row->pagu;
                  }
                  echo "Rp ".number_format($triwulan_ii);
              ?>
          </td>
          <td style="text-align: right">
              <?php
                  $this->db->where('id_program', $key->id_program);
                  $this->db->where('triwulan', 'iii');
                  $queri = $this->db->get('rfk_realisasi');
                  $triwulan_iii = 0;
                  foreach ($queri->result() as $row) {
                      $triwulan_iii += $row->pagu;
                  }
                  echo "Rp ".number_format($triwulan_iii);
              ?>
          </td>
          <td style="text-align: right">
              <?php
                  $this->db->where('id_program', $key->id_program);
                  $this->db->where('triwulan', 'iv');
                  $queri = $this->db->get('rfk_realisasi');
                  $triwulan_iv = 0;
                  foreach ($queri->result() as $row) {
                      $triwulan_iv += $row->pagu;
                  }
                  echo "Rp ".number_format($triwulan_iv);
              ?>
          </td>
          
          <td style="text-align: right">
              <?php
                  $total = $triwulan_i + $triwulan_ii + $triwulan_iii + $triwulan_iv;
                  $sisa = intval($pagu) - intval($total);
                  echo "Rp ".number_format($sisa);
              ?>
          </td>
        </tr>
      <?php
        endforeach
      ?> --}}
    </tbody>
  </table>
@endsection