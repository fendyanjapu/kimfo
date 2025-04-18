@extends('layouts.template')

@section('content')
	<div class="herocontent">
		<div class="row justify-content-center">
			<div class="col-md-8 shadow-xl bg-white rounded">

				<form class="px-5 py-5" action="{{ route('kinerja_harian.store') }}" method="post"
					enctype="multipart/form-data">
					@csrf
					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Sasaran</label>
						<div class="col-sm-8">
							<select id="sasaran" class="form-control" name="sasaran_id">
								<option value=""></option>
								@foreach ($sasarans as $item)
									<option value="{{ $item->id }}">{{ $item->nama_sasaran }}</option>
								@endforeach
								<option value="0">Tugas Lainnya</option>
							</select>
						</div>
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							@error('sasaran_id')
								<small class="alert-danger">{{ $message }}</small>
							@enderror
						</div>
					</div>

					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Indikator</label>
						<div class="col-sm-8">
							<select id="indikator" class="form-control" name="indikator_id">
								<option value=""></option>
							</select>
						</div>
					</div>

					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Kinerja Harian</label>
						<div class="col-sm-8">
							<textarea name="kinerja_harian" class="form-control" style="width:100%"
								id="kinerja_harian">{{ old('kinerja_harian') }}</textarea>
						</div>
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							@error('kinerja_harian')
								<small class="alert-danger">{{ $message }}</small>
							@enderror
						</div>
					</div>

					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Jumlah</label>
						<div class="col-sm-8">
							<input type="number" style="width:100%" name="jumlah" class="form-control" id="jumlah"
								value="{{ old('jumlah') }}" />
						</div>
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							@error('jumlah')
								<small class="alert-danger">{{ $message }}</small>
							@enderror
						</div>
					</div>

					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Satuan</label>
						<div class="col-sm-8">
							<input type="text" style="width:100%" name="satuan" class="form-control" id="satuan"
								value="{{ old('satuan') }}" />
						</div>
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							@error('satuan')
								<small class="alert-danger">{{ $message }}</small>
							@enderror
						</div>
					</div>

					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Tanggal</label>
						<div class="col-sm-8">
							<input type="date" style="width:100%" name="tgl_input" class="form-control" id="tgl_input"
								value="{{ old('tgl_input') }}" />
						</div>
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8">
							@error('tgl_input')
								<small class="alert-danger">{{ $message }}</small>
							@enderror
						</div>
					</div>

					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Jam</label>
						<div class="col-sm-4">
							<input type="time" style="width:100%" name="jam_awal" class="form-control" id="jam_awal"
								value="{{ old('jam_awal') }}" />
						</div>
						<br>
						<div class="col-sm-4">
							<input type="time" style="width:100%" name="jam_akhir" class="form-control" id="jam_akhir"
								value="{{ old('jam_akhir') }}" />
						</div>
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-4">
							@error('jam_awal')
								<small class="alert-danger">{{ $message }}</small>
							@enderror
						</div>
						<br>
						<div class="col-sm-4">
							@error('jam_akhir')
								<small class="alert-danger">{{ $message }}</small>
							@enderror
						</div>
					</div>

					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Bukti Kegiatan</label>
						<div class="col-sm-8">
							<input type="file" name="bukti_kegiatan" required>
						</div>
						<label class="col-sm-4 control-label"><small>*maksimal file 3 MB</small></label>
						<div class="col-sm-8">
							@error('bukti_kegiatan')
								<small class="alert-danger">{{ $message }}</small>
							@enderror
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

	<script>
		// $(function(){
		//  $("#sasaran").select2();
		// }); 
		// $(function(){
		//  $("#sasaran-utama").select2();
		// }); 

		document.getElementById('sasaran').addEventListener('change', function () {
			var sasaranId = this.value;
			fetch(`/pegawai/get-indikator/${sasaranId}`)
				.then(response => response.json())
				.then(data => {
					var cityDropdown = document.getElementById('indikator');
					cityDropdown.innerHTML = '';
					data.forEach(function (city) {
						var option = document.createElement('option');
						option.value = city.id;
						option.textContent = city.nama_indikator;
						cityDropdown.appendChild(option);
					});
				});
		});
	</script>

@endsection