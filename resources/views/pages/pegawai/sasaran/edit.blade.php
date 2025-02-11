@extends('layouts.template')

@section('content')

<div class="herocontent">
	<div class="row justify-content-center">
		<div class="col-md-8 shadow-xl bg-white rounded">

			<form class="px-5 py-5" action="{{ route('sasaran.update', ['sasaran' => $sasaran]) }}" method="post">
				@csrf
				@method('PUT')
				<div class="form-group row mt-3">
					<label class="col-sm-4 control-label">Sasaran Utama</label>
					<div class="col-sm-8">
						<select id="sasaran" class="form-control" name="sasaran_utama_id" required>
							<option value=""></option>
							@foreach ($sasaranUtama as $item)
								<option value="{{ $item->id }}" {{ $item->id == $sasaran->sasaran_utama_id ? 'selected' : '' }}>{{ $item->sasaran_strategis }}</option>
							@endforeach
						</select>
					</div>
				</div>
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