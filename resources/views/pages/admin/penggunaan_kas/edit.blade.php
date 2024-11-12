@extends('layouts.template')

@section('content')
    
<form action="{{ route('penggunaan_kas.update', ['penggunaan_ka' => $penggunaan_ka]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
	<div class="form-group">
		<label class="col-sm-2 control-label">Program</label>
		<div class="col-sm-8">
			<select class="form-control" name="id_program" id="id_program" required>
			    <option value=""></option>
			    @foreach ($rfk_program as $item)
                    <option value="{{ $item->id_program }}" {{ $penggunaan_ka->id_program == $item->id_program ? 'selected' : '' }}>
                        {{ $item->program }}
                    </option>
                @endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Kegiatan</label>
		<div class="col-sm-8">
			<select class="form-control" name="id_kegiatan" id="id_kegiatan" required>
			    <option></option>
                @foreach ($rfk_kegiatan as $item)
                    @if ($item->id_program == $penggunaan_ka->id_program)
                        <option value="{{ $item->id_kegiatan }}" {{ $penggunaan_ka->id_kegiatan == $item->id_kegiatan ? 'selected' : '' }}>
                            {{ $item->kegiatan }}
                        </option>
                    @endif
                @endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Subkegiatan</label>
		<div class="col-sm-8">
			<select class="form-control" name="id_subkegiatan" id="id_subkegiatan" required>
			    <option></option>
                @foreach ($rfk_subkegiatan as $item)
                    @if ($item->id_kegiatan == $penggunaan_ka->id_kegiatan)
                        <option value="{{ $item->id_subkegiatan }}" {{ $penggunaan_ka->id_subkegiatan == $item->id_subkegiatan ? 'selected' : '' }}>
                            {{ $item->subkegiatan }}
                        </option>
                    @endif
                @endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Uraian</label>
		<div class="col-sm-8">
			<select class="form-control" name="uraian" id="uraian" required>
			    <option></option>
                @foreach ($uraian_subkegiatan as $item)
                    @if ($item->id_subkegiatan == $penggunaan_ka->id_subkegiatan)
                        <option value="{{ $item->id_uraian_subkegiatan }}" {{ $penggunaan_ka->uraian == $item->id_uraian_subkegiatan ? 'selected' : '' }}>
                            {{ $item->uraian }}
                        </option>
                    @endif
                @endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Bulan</label>
		<div class="col-sm-4">
			<select class="form-control" name="bulan" required>
			    <option value=""></option>
			    <option value="1" {{ $penggunaan_ka->bulan == 1 ? 'selected' : '' }}>1</option>
			    <option value="2" {{ $penggunaan_ka->bulan == 2 ? 'selected' : '' }}>2</option>
			    <option value="3" {{ $penggunaan_ka->bulan == 3 ? 'selected' : '' }}>3</option>
			    <option value="4" {{ $penggunaan_ka->bulan == 4 ? 'selected' : '' }}>4</option>
			    <option value="5" {{ $penggunaan_ka->bulan == 5 ? 'selected' : '' }}>5</option>
			    <option value="6" {{ $penggunaan_ka->bulan == 6 ? 'selected' : '' }}>6</option>
			    <option value="7" {{ $penggunaan_ka->bulan == 7 ? 'selected' : '' }}>7</option>
			    <option value="8" {{ $penggunaan_ka->bulan == 8 ? 'selected' : '' }}>8</option>
			    <option value="9" {{ $penggunaan_ka->bulan == 9 ? 'selected' : '' }}>9</option>
			    <option value="10" {{ $penggunaan_ka->bulan == 10 ? 'selected' : '' }}>10</option>
			    <option value="11" {{ $penggunaan_ka->bulan == 11 ? 'selected' : '' }}>11</option>
			    <option value="12" {{ $penggunaan_ka->bulan == 12 ? 'selected' : '' }}>12</option>
			</select>
		</div>
	</div>
	<!--<div class="form-group">-->
	<!--	<label class="col-sm-2 control-label">Triwulan</label>-->
	<!--	<div class="col-sm-4">-->
	<!--		<select class="form-control" name="triwulan" required>-->
	<!--		    <option value=""></option>-->
	<!--		    <option value="i">I</option>-->
	<!--		    <option value="ii">II</option>-->
	<!--		    <option value="iii">III</option>-->
	<!--		    <option value="iv">IV<ooption>-->
	<!--		</select>-->
	<!--	</div>-->
	<!--</div>-->
	
    <div class="form-group">
  		<label class="col-sm-2 control-label">Pagu (Keuangan)</label>
  		<div class="col-sm-4">
  			<input type="text" class="form-control" name="pagu" value="{{ $penggunaan_ka->pagu }}" id="pagu" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
  		</div>
  	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Bukti Kegiatan</label>
		<div class="col-sm-4">
			<input type="file" class="form-control" name="gbr" accept="image/*" >
			 <small>Gambar maksimal 4 MB</small>
		</div>
	</div>
	<div class="form-group">
  		<label class="col-sm-2 control-label">Keterangan</label>
  		<div class="col-sm-4">
  			<input type="text" class="form-control" name="keterangan" value="{{ $penggunaan_ka->keterangan }}" >
  		</div>
  	</div>
      <br><br>
	<div class="col-sm-offset-2">
		<button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Simpan</button>
    <a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
	</div>
</form>
<script>
    $(document).ready(function(){
       $("#id_program").change(function(){
           let id_program = $("#id_program").val();
           $.ajax({
               type : "POST",
               url : '/admin/select-program',
               data   : {
               '_token': '{{ csrf_token() }}',
               'id_kode': id_program,
               },
               dataType: 'json',
               cache: false,
   
               success: function(data){
   
                   var html = '<option value=""></option>';
                   var i;
   
                   for(i=0; i<data.length; i++){
                       html += '<option value='+data[i].id_kegiatan+'>'+data[i].kegiatan+'</option>';
                   }
                   $('#id_kegiatan').html(html);
   
               }
           });
       });
   
       $("#id_kegiatan").change(function(){
           let id_kegiatan = $("#id_kegiatan").val();
           $.ajax({
               type : "POST",
               url : '/admin/select-kkegiatan',
               data   : {
               '_token': '{{ csrf_token() }}',
               'id_kode': id_kegiatan,
               },
               dataType: 'json',
               cache: false,
   
               success: function(data){
   
                   var html = '<option value=""></option>';
                   var i;
   
                   for(i=0; i<data.length; i++){
                       html += '<option value='+data[i].id_subkegiatan+'>'+data[i].subkegiatan+'</option>';
                   }
                   $('#id_subkegiatan').html(html);
               }
           });
       });

       $("#id_subkegiatan").change(function(){
           let id_subkegiatan = $("#id_subkegiatan").val();
           $.ajax({
               type : "POST",
               url : '/admin/select-subkegiatan',
               data   : {
               '_token': '{{ csrf_token() }}',
               'id_kode': id_subkegiatan,
               },
               dataType: 'json',
               cache: false,
   
               success: function(data){
   
                   var html = '<option value=""></option>';
                   var i;
   
                   for(i=0; i<data.length; i++){
                       html += '<option value='+data[i].id_uraian_subkegiatan+'>'+data[i].uraian+'</option>';
                   }
                   $('#uraian').html(html);
               }
           });
       });
   });
   
   
   </script>

@endsection