
<form action="<?php echo base_url('rencana_kas/save') ?>" method="post" >
    <input type="hidden" name="redirect" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
    <input type="hidden" class="form-control" name="jenis_data" value="<?= $jenis_data ?>">
	<div class="form-group">
		<label class="col-sm-4 control-label">Program</label>
		<div class="col-sm-8">
			<select class="form-control" name="id_data" id="id_program" required>
			    <option value=""></option>
			    <?php foreach ($program->result() as $row): ?>
			        <option value="<?= $row->id_program ?>"><?= $row->program ?></option>
			    <?php endforeach ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Triwulan I</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="triwulan_i">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Triwulan II</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="triwulan_ii">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Triwulan III</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="triwulan_iii">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Triwulan IV</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="triwulan_iv">
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
</form>
<script>
		
		$("#id_program").change(function(){
    
            // variabel dari nilai combo box kendaraan
            let id_program = $("#id_program").val();
            
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url : "<?= base_url('select_combo/select_kode_program'); ?>",
                method : "GET",
                data : {id_program:id_program},
                async : false,
                dataType : 'json',
                success: function(data){
                    
                    $('#kode_a').val(data[0].kode_a);
                    $('#kode_b').val(data[0].kode_b);
                    $('#program_kode').val(data[0].program_kode);
                    
                }
            });
        });
        $("#satuan").keyup(function(){
            let satuan = $("#satuan").val();
            $("#satuan1").val(satuan);
            $("#satuan2").val(satuan);
        });
</script>