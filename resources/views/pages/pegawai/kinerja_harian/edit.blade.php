@extends('layouts.template')

@section('content')
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

<form action="{{ route('kinerja_harian.update', ['kinerja_harian' => $kinerja_pegawai]) }}" method="post">
    @csrf
    @method('PUT')
	<div class="row">
		<div class="col-12 col-md-8">
			<div class="form-group">
				<label class="col-sm-12 control-label">Sasaran</label>
				<div class="col-sm-12">
					<select id="sasaran" class="form-control" name="sasaran_id" required>  
						<option value="">Pilih Sasaran</option>
						@foreach ($sasarans as $item)
						<option value="{{ $item->id }}" {{ $item->id == $kinerja_pegawai->sasaran_id ? 'selected' : '' }}>{{ $item->nama_sasaran }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">Indikator</label>
				<div class="col-sm-12">
					<select id="indikator" class="form-control" name="indikator_id" required>  
						<option value="">Pilih Indikator</option>
						@foreach ($indikators as $item)
						<option value="{{ $item->id }}" {{ $item->id == $kinerja_pegawai->indikator_id ? 'selected' : '' }}>{{ $item->nama_indikator }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">Kinerja Harian</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="kinerja_harian" class="form-control" id="kinerja_harian" value="{{ $kinerja_pegawai->kinerja_harian }}" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">Jumlah</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="jumlah" class="form-control" id="jumlah" value="{{ $kinerja_pegawai->jumlah }}" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">Satuan</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="satuan" class="form-control" id="satuan" value="{{ $kinerja_pegawai->satuan }}" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">Tanggal</label>
				<div class="col-sm-12">
					<input type="date" style="width:100%" name="tgl_input" class="form-control" id="tgl_input" value="{{ $kinerja_pegawai->tgl_input }}" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">Jam</label>
				<div class="col-sm-12">
					<input type="time" style="width:100%" name="jam_awal" class="form-control" id="jam_awal" value="{{ $kinerja_pegawai->jam_awal }}" required/>
				</div>
				<br>
				<div class="col-sm-12">
					<input type="time" style="width:100%" name="jam_akhir" class="form-control" id="jam_akhir" value="{{ $kinerja_pegawai->jam_akhir }}" required/>
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

<script>
    $(function(){
     $("#indikator").select2();
    }); 
</script>

@endsection