@extends('layouts.template')

@section('content')

<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('rfk_subkegiatan.update', $subkegiatan->id_subkegiatan)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-4 control-label">Kode</label>
                    <div class="col-sm-8">
                        <div class="row" style="margin-left:-12px">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode_a" value="{{ $subkegiatan->kegiatan->program->kode_a }}" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode_b" value="{{ $subkegiatan->kegiatan->program->kode_b }}" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="program_kode" value="{{ $subkegiatan->kegiatan->program->program_kode }}" readonly>
                            </div>
                            <div class="col-sm-4 mt-2">
                                <input type="text" class="form-control" id="kegiatan_kode" value="{{ $subkegiatan->kegiatan->kegiatan_kode }}" readonly>
                            </div>
                            <div class="col-sm-4 mt-2">
                                <input type="text" class="form-control" name="subkegiatan_kode" value="{{ $subkegiatan->subkegiatan_kode }}" id="subkegiatan_kode">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Sasaran</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="subkegiatan_sasaran" value="{{ $subkegiatan->subkegiatan_sasaran }}">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Program</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="id_program" id="id_program" required>
                            <option value=""></option>
                            @foreach ($program as $row)
                                <option value="{{ $row->id_program }}" {{ $row->id_program == $subkegiatan->kegiatan->program->id_program ? 'selected' : '' }}>{{ $row->program }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Kegiatan</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="id_kegiatan" id="id_kegiatan" required>
                            @foreach ($kegiatan as $krow)
                                <option value="{{ $krow->id_kegiatan }}" {{ $krow->id_kegiatan == $subkegiatan->id_kegiatan ? 'selected' : '' }}>{{ $krow->kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Subkegiatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="subkegiatan" id="subkegiatan" value="{{ $subkegiatan->subkegiatan }}">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Indikator Kinerja Program (Outcome/Kegiatan Output)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="subkegiatan_indikator_kinerja" value="{{ $subkegiatan->subkegiatan_indikator_kinerja }}">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Kode Rekening</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="kode_rekening" value="{{ $subkegiatan->kode_rekening }}">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Pagu SubKegiatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="pagu_subkegiatan" value="{{ $subkegiatan->pagu_subkegiatan }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>
                </div>

                <div class="col-sm-offset-4 mt-4 text-center">
                    <button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Simpan</button>
                    <a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

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
               url : '/admin/select-kegiatan',
               data   : {
               '_token': '{{ csrf_token() }}',
               'id_kode': id_kegiatan,
               },
               dataType: 'json',
               cache: false,

               success: function(data){
                   $('#kode_a').val(data[0].kode_a);
                   $('#kode_b').val(data[0].kode_b);
                   $('#program_kode').val(data[0].program_kode);
                   $('#kegiatan_kode').val(data[0].kegiatan_kode);
               }
           });
       });
   });

   </script>


@endsection
