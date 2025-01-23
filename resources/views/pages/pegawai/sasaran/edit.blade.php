@extends('layouts.template')

@section('content')

<div class="herocontent">
	<div class="row justify-content-center">
		<div class="col-md-8 shadow-xl bg-white rounded">

			<form class="px-5 py-5" action="{{ route('sasaran.update', ['sasaran' => $sasaran]) }}" method="post">
				@csrf
				@method('PUT')

				<div class="form-group row mt-3">
					<label class="col-sm-4 control-label">Sasaran</label>
					<div class="col-sm-8">
						<input type="text" style="width:100%" name="nama_sasaran" class="form-control" id="nama_sasaran"
							value="<?= $sasaran->nama_sasaran ?>" required />
					</div>
				</div>

				<br>
				<div class="col-sm-offset-4 mt-4 text-center">
					<button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i>
						Simpan</button>
					<a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
				</div>


			</form>

		</div>
	</div>
</div>
@endsection