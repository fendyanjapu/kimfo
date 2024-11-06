@extends('layouts.template')

@section('content')
<script>
	$(document).ready(function(){
		$('#tabel').DataTable( {
		   "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
            } 
		});
		
	});
</script>

<h1>{{ $judul }}</h1><br>
    <form action="{{ route('iku.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
		@csrf
		<input type="hidden" class="form-control" id="jenis_dokumen" name="jenis_dokumen" value="{{ $judul }}">
		<input type="hidden" class="form-control" id="id_sopd" name="id_sopd" value="18">
		<input type="hidden" class="form-control" id="i" name="i" value="{{ $i }}">
    	<div class="form-group">
    		<label class="col-sm-2 control-label">Nama Dokumen:</label>
    		<div class="col-sm-9">
    			<input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-2 control-label">File:</label>
    		<div class="col-sm-9" id="unggah">
    			<input type="file" name="dokumen" id="dokumen" class="form-control-file" accept=".docx,.xlsx,.pdf" required=""><br>
    		</div>
    	</div>
    	<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
    		</div>
    	</div>
        <br>
    	<div class="col-sm-offset-2">
    		<button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Simpan</button>
    	</div>
    </form><br><br>

<table id="tabel" class="table table-striped table-bordered" >
	<thead>
		<th style="text-align: center">NO</th>
		
		<th>Nama Dokumen</th>
		<th>Dokumen</th>
		<th style="width: 175px;"></th>
	</thead>
	<tbody>
		@foreach ($query as $key)
		<tr>
			<td style="text-align: center">{{ $loop->iteration }}</td>
			
			<td>{{ $key->nama_dokumen }}</td>
			<td>{{ $key->dokumen }}</td>
			<td style="text-align: center">
				<a href="{{ route('iku.show', ['iku' => $key->id]) }}" target="blank" class="btn btn-success" title="Lihat"><i class="fa fa-eye"></i>Lihat</a>
				<a href="{{ route('iku.download', ['iku' =>$key->id]) }}" target="blank" class="btn btn-primary" title="Unduh"><i class="fa fa-download"></i>Download</a>
				<form action="{{ route('iku.destroy', ['iku' => $key->id]) }}" method="POST">
					@csrf
					<button class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-eraser"> Hapus</i></button>
					@method('delete')
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection