<script>
	$(document).ready(function(){
        $("#satuan").keyup(function(){
            let satuan = $("#satuan").val();
            $("#satuan1").val(satuan);
            $("#satuan2").val(satuan);
        });
	});
</script>
<form action="<?php echo base_url('rfk_program/update') ?>" method="post" >
    <input type="hidden" name="redirect" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
	<?php foreach ($query->result() as $key): ?>
	    <div class="form-group">
	        <input type="hidden" class="form-control" name="id_program" value="<?= $key->id_program ?>">
    		<label class="col-sm-4 control-label">Kode</label>
    		<div class="col-sm-2">
    			<input type="text" class="form-control" name="kode_a" value="<?= $key->kode_a ?>">
    		</div>
    		<div class="col-sm-2">
    			<input type="text" class="form-control" name="kode_b" value="<?= $key->kode_b ?>">
    		</div>
    		<div class="col-sm-2">
    			<input type="text" class="form-control" name="program_kode" value="<?= $key->program_kode ?>">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Sasaran</label>
    		<div class="col-sm-8">
    			<input type="text" class="form-control" name="sasaran" value="<?= $key->sasaran ?>">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Program</label>
    		<div class="col-sm-8">
    			<input type="text" class="form-control" name="program" value="<?= $key->program ?>">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Indikator Kinerja Program (Outcome/Kegiatan Output)</label>
    		<div class="col-sm-8">
    			<input type="text" class="form-control" name="indikator_kinerja" value="<?= $key->indikator_kinerja ?>">
    		</div>
    	</div>
        <div class="form-group">
      		<label class="col-sm-4 control-label">Kode Rekening</label>
      		<div class="col-sm-4">
      			<input type="text" class="form-control" name="kode_rekening" value=<?= $key->kode_rekening ?>>
      		</div>
      	</div>
      	<div class="form-group">
      		<label class="col-sm-4 control-label">Pagu Program</label>
      		<div class="col-sm-4">
      			<input type="text" class="form-control" name="pagu_program" value=<?= $key->pagu_program ?>>
      		</div>
      	</div>
    	<div class="form-group">
    		<div class="col-sm-offset-4 col-sm-10">
    		</div>
    	</div>
    	<div class="col-sm-offset-4">
    		<button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Simpan</button>
        <a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
    	</div>
	<?php endforeach ?>
</form>
