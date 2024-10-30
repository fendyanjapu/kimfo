@extends('layouts.template')

@section('content')

<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('uraian_subkegiatan.store')}}" method="post">
                @csrf

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Program</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="id_program" id="id_program" required>
                            <option value=""></option>
                            @foreach ($program as $row)
                                <option value="{{ $row->id_program }}">{{ $row->program }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Kegiatan</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="id_kegiatan" id="id_kegiatan" required>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Subkegiatan</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="id_subkegiatan" id="id_subkegiatan" required>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Kode Rekening</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="kode_rekening">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Uraian</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="uraian">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Pagu</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="pagu" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
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
});


</script>


@endsection
