@extends('layouts.template')

@section('content')
	<div class="herocontent">
		<div class="row justify-content-center">
			<div class="col-md-8 shadow-xl bg-white rounded">

				<form class="px-5 py-5"
					action="{{ route('kinerja_harian.update', ['kinerja_harian' => $kinerja_pegawai]) }}" method="post">
					@csrf
					@method('PUT')

					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Sasaran</label>
						<div class="col-sm-8">
							<select id="sasaran" class="form-control" name="sasaran_id" required>
								<option value=""></option>
								@foreach ($sasarans as $item)
									<option value="{{ $item->id }}" {{ $item->id == $kinerja_pegawai->sasaran_id ? 'selected' : '' }}>{{ $item->nama_sasaran }}</option>
								@endforeach
								<option value="0" {{ $kinerja_pegawai->sasaran_id == 0 ? 'selected' : '' }}>Tugas Lainnya</option>
							</select>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Indikator</label>
						<div class="col-sm-8">
							<select id="indikator" class="form-control" name="indikator_id" required>
								<option value=""></option>
								@foreach ($indikators as $item)
									<option value="{{ $item->id }}" {{ $item->id == $kinerja_pegawai->indikator_id ? 'selected' : '' }}>{{ $item->nama_indikator }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Kinerja Harian</label>
						<div class="col-sm-8">
							<textarea name="kinerja_harian" class="form-control" style="width:100%"
								id="kinerja_harian" required>{{ $kinerja_pegawai->kinerja_harian }}</textarea>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Jumlah</label>
						<div class="col-sm-8">
							<input type="text" style="width:100%" name="jumlah" class="form-control" id="jumlah"
								value="{{ $kinerja_pegawai->jumlah }}" required />
						</div>
					</div>
					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Satuan</label>
						<div class="col-sm-8">
							<input type="text" style="width:100%" name="satuan" class="form-control" id="satuan"
								value="{{ $kinerja_pegawai->satuan }}" required />
						</div>
					</div>
					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Tanggal</label>
						<div class="col-sm-8">
							<input type="date" style="width:100%" name="tgl_input" class="form-control" id="tgl_input"
								value="{{ $kinerja_pegawai->tgl_input }}" required />
						</div>
					</div>
					<div class="form-group row mt-3">
						<label class="col-sm-4 control-label">Jam</label>
						<div class="col-sm-4">
							<input type="time" style="width:100%" name="jam_awal" class="form-control" id="jam_awal"
								value="{{ $kinerja_pegawai->jam_awal }}" required />
						</div>
						<br>
						<div class="col-sm-4">
							<input type="time" style="width:100%" name="jam_akhir" class="form-control" id="jam_akhir"
								value="{{ $kinerja_pegawai->jam_akhir }}" required />
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
		$(function () {
			$("#indikator").select2();
		}); 
	</script>

@endsection