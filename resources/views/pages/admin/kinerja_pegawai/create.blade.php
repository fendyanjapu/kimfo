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

<form action="{{ route('kinerja_pegawai.store') }}" method="post" enctype="multipart/form-data">
    @csrf
	<div class="row">
		<div class="col-12 col-md-8">
			@foreach ($pegawai as $row)
                <input type="hidden" style="width:100%" name="user_id" class="form-control" id="user_id" value="{{ $row->id }}" readonly/>
			@endforeach
			<div class="form-group">
				<label class="col-sm-12 control-label">Kinerja Harian</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="kinerja_harian" class="form-control" id="kinerja_harian" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">IKU Bidang</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="iku_bidang" class="form-control" id="iku_bidang" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">Bukti Kegiatan</label>
				<div class="col-sm-12">
					<input type="file" accept="image/*" capture="user" name="bukti_kegiatan" required>
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