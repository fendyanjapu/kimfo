@extends('layouts.template')

@section('content')


<form action="{{ route('jabatan.update', ['jabatan' => $jabatan]) }}" method="post">
    @csrf
	@method('PUT')

	<div class="row">
        
		<div class="col-12 col-md-8">
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Jabatan</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="nama_jabatan" class="form-control" id="nama_jabatan" value="<?= $jabatan->nama_jabatan ?>" required/>
				</div>
			</div>
			
			<br>
			<div class="col-sm-offset-2">
				<button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Simpan</button>
			<a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
			</div>
		</div>
	</div>
	
</form><br><br>
@endsection