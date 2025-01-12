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

<form action="{{ route('kinerja_harian.store') }}" method="post" enctype="multipart/form-data">
    @csrf
	<div class="row">
		<div class="col-12 col-md-8">
			<div class="form-group">
				<label class="col-sm-12 control-label">Kinerja Harian</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="kinerja_harian" class="form-control" id="kinerja_harian" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">Indikator</label>
				<div class="col-sm-12">
					<select id="indikator" class="form-control" name="indikator_id" required>  
						<option value="">Pilih Indikator</option>
						@foreach ($indikators as $item)
						<option value="{{ $item->id }}">{{ $item->nama_indikator }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-12 control-label">Tanggal</label>
				<div class="col-sm-12">
					<input type="date" style="width:100%" name="tgl_input" class="form-control" id="tgl_input" required/>
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

<script>
    $(function(){
     $("#indikator").select2();
    }); 
</script>

@endsection