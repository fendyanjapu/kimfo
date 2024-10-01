<Style>
    @media only screen and (min-width: 600px) {
        .col-12 {
            width:100%;
        }
    }
      @media only screen and (min-width: 992px) {
        .col-12 {
            margin:0 auto;
            width:30%;
        }
    }
</Style>

<form action="<?= base_url('data_pegawai/update') ?>" method="post">
    <input type="hidden" name="redirect" value="<?= $_SERVER['HTTP_REFERER']; ?>">
	<?php foreach($query->result() as $key)  : ?>
	<div class="row">
        <input type="hidden" value="<?=$key->username?>" name="userlama">
		<div class="col-12 col-md-8">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nip</label>
				<div class="col-sm-8">
					<input type="text" style="width:100%" name="nip" class="form-control" id="nip" value="<?=$key->nip?>" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-8">
					<input type="text" style="width:100%" name="nama" class="form-control" id="nama" value="<?=$key->nama?>" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jabatan</label>
				<div class="col-sm-8">
					<input type="text" style="width:100%" name="jabatan" class="form-control" id="jabatan" value="<?=$key->jabatan?>" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Username Login</label>
				<div class="col-sm-8">
					<input type="text" style="width:100%" name="username" class="form-control" id="username" value="<?=$key->username?>"  required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Password</label>
				<div class="col-sm-8">
					<input type="password" id="password" style="width:100%" class="form-control" value="<?=$key->password?>" name="password" placeholder="Enter new password if you want to change" oninput="passwordChanged()">
					<input type="hidden" id="password_changed" name="password_changed" value="false">
				</div>
			</div>
			<div class="col-sm-offset-2">
				<button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Simpan</button>
			<a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
			</div>
		</div>
	</div>
    <?php endforeach ?>
</form><br><br>
<script>
function passwordChanged() {
    document.getElementById('password_changed').value = 'true';
}
</script>