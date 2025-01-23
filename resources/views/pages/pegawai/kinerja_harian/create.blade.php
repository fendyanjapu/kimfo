@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">

<form class="px-5 py-5" action="{{ route('kinerja_harian.store') }}" method="post" enctype="multipart/form-data">
    @csrf

			<div class="form-group row mt-3">
				<label class="col-sm-4 control-label">Sasaran Utama</label>
				<div class="col-sm-8">
					<select id="sasaran-utama" class="form-control" name="sasaran_utama_id" required>  
						<option value=""></option>
						@foreach ($sasaranUtama as $item)
							<option value="{{ $item->id }}">{{ $item->sasaran_strategis }}</option>
						@endforeach
					</select>
				</div>
			</div>
			
			<div class="form-group row mt-3">
				<label class="col-sm-4 control-label">Sasaran</label>
				<div class="col-sm-8">
					<select id="sasaran" class="form-control" name="sasaran_id" required>  
						<option value=""></option>
						@foreach ($sasarans as $item)
						<option value="{{ $item->id }}">{{ $item->nama_sasaran }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row mt-3">
				<label class="col-sm-4 control-label">Indikator</label>
				<div class="col-sm-8">
					<select id="indikator" class="form-control" name="indikator_id" required>  
						<option value=""></option>
					</select>
				</div>
			</div>
			<div class="form-group row mt-3">
				<label class="col-sm-4 control-label">Kinerja Harian</label>
				<div class="col-sm-8">
					<input type="text" style="width:100%" name="kinerja_harian" class="form-control" id="kinerja_harian" required/>
				</div>
			</div>
			<div class="form-group row mt-3">
				<label class="col-sm-4 control-label">Jumlah</label>
				<div class="col-sm-8">
					<input type="text" style="width:100%" name="jumlah" class="form-control" id="jumlah" required/>
				</div>
			</div>
			<div class="form-group row mt-3">
				<label class="col-sm-4 control-label">Satuan</label>
				<div class="col-sm-8">
					<input type="text" style="width:100%" name="satuan" class="form-control" id="satuan" required/>
				</div>
			</div>
			<div class="form-group row mt-3">
				<label class="col-sm-4 control-label">Tanggal</label>
				<div class="col-sm-8">
					<input type="date" style="width:100%" name="tgl_input" class="form-control" id="tgl_input" required/>
				</div>
			</div>
			<div class="form-group row mt-3">
				<label class="col-sm-4 control-label">Jam</label>
				<div class="col-sm-4">
					<input type="time" style="width:100%" name="jam_awal" class="form-control" id="jam_awal" required/>
				</div>
				<br>
				<div class="col-sm-4">
					<input type="time" style="width:100%" name="jam_akhir" class="form-control" id="jam_akhir" required/>
				</div>
			</div>
			<div class="form-group row mt-3">
				<label class="col-sm-4 control-label">Bukti Kegiatan</label>
				<div class="col-sm-8">
					<input type="file" accept="image/*" capture="user" name="bukti_kegiatan" required>
				</div>
			</div>
            <br>
			<div class="col-sm-offset-4 mt-4 text-center">
				<button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Simpan</button>
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