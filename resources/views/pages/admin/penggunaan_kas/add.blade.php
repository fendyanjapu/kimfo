@extends('layouts.template')

@section('content')
    
<form action="{{ route('penggunaan_kas.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    
	<div class="form-group">
		<label class="col-sm-2 control-label">Program</label>
		<div class="col-sm-8">
			<select class="form-control" name="id_program" id="id_program" required>
			    <option value=""></option>
			    @foreach ($rfk_program as $item)
                    <option value="{{ $item->id_program }}">{{ $item->program }}</option>
                @endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Kegiatan</label>
		<div class="col-sm-8">
			<select class="form-control" name="id_kegiatan" id="id_kegiatan" required>
			    <option></option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Subkegiatan</label>
		<div class="col-sm-8">
			<select class="form-control" name="id_subkegiatan" id="id_subkegiatan" required>
			    <option></option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Uraian</label>
		<div class="col-sm-8">
			<select class="form-control" name="uraian" id="uraian" required>
			    <option></option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Bulan</label>
		<div class="col-sm-4">
			<select class="form-control" name="bulan" required>
			    <option value=""></option>
			    <option value="1">1</option>
			    <option value="2">2</option>
			    <option value="3">3</option>
			    <option value="4">4</option>
			    <option value="5">5</option>
			    <option value="6">6</option>
			    <option value="7">7</option>
			    <option value="8">8</option>
			    <option value="9">9</option>
			    <option value="10">10</option>
			    <option value="11">11</option>
			    <option value="12">12</option>
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
  			<input type="text" class="form-control" name="pagu" id="pagu" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
  		</div>
  	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Bukti Kegiatan</label>
		<div class="col-sm-4">
			<input type="file" class="form-control" name="gbr" accept="image/*" required>
			 <small>Gambar maksimal 4 MB</small>
		</div>
	</div>
	<div class="form-group">
  		<label class="col-sm-2 control-label">Keterangan</label>
  		<div class="col-sm-4">
  			<input type="text" class="form-control" name="keterangan" >
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