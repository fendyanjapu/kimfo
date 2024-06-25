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
<!--<section class="module bg-dark-30 about-page-header" data-background="<?php echo base_url() ?>assets/images/rumpiang.jpg">-->
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h1 class="module-title font-alt mb-0">Program</h1>
      </div>
  </div>
</div>
</section>
<br><br><br><br>
<div class="row">
    <div class="col-md-16">
        <table id="tabel" class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th rowspan="3" style="vertical-align: middle; text-align: center" width="15px">NO</th>
      <th rowspan="3" style="vertical-align: middle; text-align: center">Kode</th>
      <th rowspan="3" style="vertical-align: middle; text-align: center">Sasaran</th>
      <th rowspan="3" style="vertical-align: middle; text-align: center">Program / Kegiatan</th>
      <th rowspan="3" style="vertical-align: middle; text-align: center">Indikator Kinerja Program (Outcome/Kegiatan Output)</th>
      <th rowspan="2" colspan="2" style="vertical-align: middle; text-align: center" class="sorting">Target Renstra Perangkat Daerah pada Tahun 2026</th>
      <th rowspan="2" colspan="2" style="vertical-align: middle; text-align: center" class="sorting">Realisasi Pencapaian Kinerja Renstra Perangkat Daerah sampai dengan Renja Perangkat Daerah Tahun Lalu (2022)</th>
      <th rowspan="2" colspan="2" style="vertical-align: middle; text-align: center" class="sorting">Target Kinerja dan Anggaran Renja Perangkat Daerah Tahun berjalan (2023) yang di evaluasi</th>
      <th colspan="8" class="sorting" style="vertical-align: middle; text-align: center">Realisasi Kinerja Pada Triwulan</th>
      <th rowspan="2" colspan="2" style="vertical-align: middle; text-align: center" class="sorting">Realisasi Capaian Kinerja dan Anggaran Renja Perangkat Daerah yang di Evaluasi</th>
      <th rowspan="2" colspan="2" style="vertical-align: middle; text-align: center" class="sorting">Realisasi Kinerja dan Anggaran Renstra Perangkat Daeah s/d tahun 2023</th>
      <th rowspan="2" colspan="2" style="vertical-align: middle; text-align: center" class="sorting">Tingkat Capaian Kinerja dan Realisasi Anggaran Renstra Perangkat Daerah s/d tahun 2022 (%)</th>
      <th rowspan="3" style="vertical-align: middle; text-align: center" width="15px">Unit Perangkat Daerah Penanggung  Jawab</th>
      <th rowspan="3" style="vertical-align: middle; text-align: center" width="15px">#</th>
     </tr>
     <tr>
      <th colspan="2" style="vertical-align: middle; text-align: center" class="sorting">I</th>
      <th colspan="2" style="vertical-align: middle; text-align: center" class="sorting">II</th>
      <th colspan="2" style="vertical-align: middle; text-align: center" class="sorting">II</th>
      <th colspan="2" style="vertical-align: middle; text-align: center" class="sorting">IV</th>
     </tr>
     <tr>
      <th style="vertical-align: middle; text-align: center">Fisik (K)</th>
      <th style="vertical-align: middle; text-align: center">Keuangan (Rp)</th>
      <th style="vertical-align: middle; text-align: center">Fisik (K)</th>
      <th style="vertical-align: middle; text-align: center">Keuangan (Rp)</th>
      <th style="vertical-align: middle; text-align: center">Fisik (K)</th>
      <th style="vertical-align: middle; text-align: center">Keuangan (Rp)</th>
      <th style="vertical-align: middle; text-align: center">Fisik (K)</th>
      <th style="vertical-align: middle; text-align: center">Keuangan (Rp)</th>
      <th style="vertical-align: middle; text-align: center">Fisik (K)</th>
      <th style="vertical-align: middle; text-align: center">Keuangan (Rp)</th>
      <th style="vertical-align: middle; text-align: center">Fisik (K)</th>
      <th style="vertical-align: middle; text-align: center">Keuangan (Rp)</th>
      <th style="vertical-align: middle; text-align: center">Fisik (K)</th>
      <th style="vertical-align: middle; text-align: center">Keuangan (Rp)</th>
      <th style="vertical-align: middle; text-align: center">Fisik (K)</th>
      <th style="vertical-align: middle; text-align: center">Keuangan (Rp)</th>
      <th style="vertical-align: middle; text-align: center">Fisik (K)</th>
      <th style="vertical-align: middle; text-align: center">Keuangan (Rp)</th>
      <th style="vertical-align: middle; text-align: center">Fisik (K)</th>
      <th style="vertical-align: middle; text-align: center">Keuangan (Rp)</th>
     </tr>
  </thead>
  <tbody>
    <?php
      $no = 0;
      foreach ($query->result() as $key):
    ?>
      <tr>
        <td style="text-align: center"><?= ++$no ?></td>
        <td><?= $key->kode_a.' '.$key->kode_b.' '.$key->program_kode ?></td>
        <td><?= $key->sasaran ?></td>
        <td><?= $key->program ?></td>
        <td><?= $key->indikator_kinerja ?></td>
        <td><?= $key->target_renstra_k.' '.$key->program_satuan ?></td>
        <?php
            $target_renstra_rp = 0;
            $realisasi_pencapaian_rp = 0;
            $target_kinerja_rp = 0;
            $this->db->where('id_program', $key->id_program);
            $que = $this->db->get('rfk_kegiatan');
            foreach ($que->result() as $var) {
                $this->db->where('id_kegiatan', $var->id_kegiatan);
                $q = $this->db->get('rfk_subkegiatan');
                foreach ($q->result() as $row) {
                    $target_renstra_rp += $row->subkegiatan_target_renstra_rp;
                    $realisasi_pencapaian_rp += $row->subkegiatan_realisasi_pencapaian_rp;
                    $target_kinerja_rp += $row->subkegiatan_target_kinerja_rp;
                }
            }
            
        ?>
        <td><?= number_format($target_renstra_rp) ?></td>
        <td><?= $key->realisasi_pencapaian_k.' '.$key->program_satuan ?></td>
        <td><?= number_format($realisasi_pencapaian_rp) ?></td>
        <td><?= $key->target_kinerja_k.' '.$key->program_satuan ?></td>
        <td><?= number_format($target_kinerja_rp) ?></td>
        <td>
            
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?= $key->program_ket ?></td>
        <td style="text-align: center">
            <a href="<?= base_url('rfk/edit_program/'.$key->id_program) ?>" class="btn btn-default" title="Edit"><i class="fa fa-edit"></i>Edit</a>
            <a href="<?= base_url('rfk/hapus_program/'.$key->id_program) ?>" onclick="return confirm('Hapus Data?')" class="btn btn-default" title="Hapus"><i class="fa fa-eraser"></i>Hapus</a>
        </td>
      </tr>
    <?php
      endforeach
    ?>
  </tbody>
</table> 
 </div>
</div>