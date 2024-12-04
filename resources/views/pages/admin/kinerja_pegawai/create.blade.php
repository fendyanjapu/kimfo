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

<form action="{{ route('kinerja_pegawai.store') }}" method="post">
    @csrf
	<div class="row">
		<div class="col-12 col-md-8">
			<div class="form-group">
				<label class="col-sm-12 control-label">Pegawai</label>
				<div class="col-sm-12">
					<select class="form-control" style="width:100%" name="user_id" id="user_id" required>
						<option value=""></option>
                        @foreach ($pegawai as $row)
                        <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                        @endforeach
						
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">Kinerja Harian</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="kinerja_harian" class="form-control" id="kinerja_harian" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">Target Bulanan</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="target_bulanan" class="form-control" id="target_bulanan" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">IKU Bidang</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="iku_bidang" class="form-control" id="iku_bidang" required/>
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