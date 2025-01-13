@extends('layouts.template')

@section('content')


<form action="{{ route('sasaran.update', ['sasaran' => $sasaran]) }}" method="post">
    @csrf
	@method('PUT')

	<div class="row">
        
		<div class="col-12 col-md-8">
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Sasaran</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="nama_sasaran" class="form-control" id="nama_sasaran" value="<?= $sasaran->nama_sasaran ?>" required/>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Target</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="target" class="form-control" id="target" value="<?= $sasaran->target ?>" required/>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Satuan</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="satuan" class="form-control" id="satuan" value="<?= $sasaran->satuan ?>"/>
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