@extends('layouts.template')

@section('content')

<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('rfk_kegiatan.store')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-4 control-label">Kode</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="kode_a" readonly>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="kode_b" readonly>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="program_kode" readonly>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="kegiatan_kode" id="kegiatan_kode">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Sasaran</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="kegiatan_sasaran">
                    </div>
                </div>
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
                        <input type="text" class="form-control" name="kegiatan">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Indikator Kinerja Program (Outcome/Kegiatan Output)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="kegiatan_indikator_kinerja">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Kode Rekening</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="kode_rekening">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Pagu Kegiatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="pagu_kegiatan">
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
            url : '/admin/select-kode-program',
            data   : {
            '_token': '{{ csrf_token() }}',
            'id_kode': id_program,
            },
            dataType: 'json',
            cache: false,

            success: function(data){
                $('#kode_a').val(data[0].kode_a);
                $('#kode_b').val(data[0].kode_b);
                $('#program_kode').val(data[0].program_kode);
            }
            });
        });
    });
</script>


@endsection
