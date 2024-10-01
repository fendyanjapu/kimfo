@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form action="{{ route('storeUraianSubkegiatan') }}" class="px-5 py-5" method="post">
                @csrf
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Program</label>
                    <div class="col-sm-8">
                        <select class="form-select @error('id_data') is-invalid @enderror" name="id_data" id="id_program" required>
                            <option value=""></option>
                            @foreach ($program as $row)
                            <option value="{{ $row->id_program }}">{{ $row->program }}</option>
                            @endforeach
                        </select>
                        @error('id_data')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Kegiatan</label>
                    <div class="col-sm-8">
                        <select class="form-select @error('id_kegiatan') is-invalid @enderror" name="id_kegiatan" id="id_kegiatan" required>
                            <option></option>
                        </select>
                        @error('id_kegiatan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Subkegiatan</label>
                    <div class="col-sm-8">
                        <select class="form-select @error('id_subkegiatan') is-invalid @enderror" name="id_subkegiatan" id="id_subkegiatan" required>
                            <option></option>
                        </select>
                        @error('id_subkegiatan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Uraian</label>
                    <div class="col-sm-8">
                        <select class="form-select @error('Uraian') is-invalid @enderror" name="Uraian" id="Uraian">
                            <option></option>
                        </select>
                        @error('Uraian')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Triwulan I</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('triwulan_i') is-invalid @enderror" name="triwulan_i">
                    </div>
                    @error('triwulan_i')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Triwulan II</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('triwulan_ii') is-invalid @enderror" name="triwulan_ii">
                    </div>
                    @error('triwulan_ii')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Triwulan III</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('triwulan_iii') is-invalid @enderror" name="triwulan_iii">
                    </div>
                    @error('triwulan_iii')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Triwulan IV</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('triwulan_iv') is-invalid @enderror" name="triwulan_iv">
                    </div>
                    @error('triwulan_iv')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
                    </div>
                </div>
                <div class="col-sm-offset-4 mt-4 text-center">
                    <button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i>
                        Simpan</button>
                    <a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#id_program").change(function () {
            let id_program = $("#id_program").val();
            $.ajax({
                type: "POST",
                url: '/admin/select-program',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id_kode': id_program,
                },
                dataType: 'json',
                cache: false,

                success: function (data) {

                    var html = '<option value=""></option>';
                    var i;

                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_kegiatan + '>' + data[i]
                            .kegiatan + '</option>';
                    }
                    $('#id_kegiatan').html(html);

                }
            });
        });

        $("#id_kegiatan").change(function () {
            let id_kegiatan = $("#id_kegiatan").val();
            $.ajax({
                type: "POST",
                url: '/admin/select-kkegiatan',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id_kode': id_kegiatan,
                },
                dataType: 'json',
                cache: false,

                success: function (data) {

                    var html = '<option value=""></option>';
                    var i;

                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_subkegiatan + '>' + data[i]
                            .subkegiatan + '</option>';
                    }
                    $('#id_subkegiatan').html(html);
                }
            });
        });

        $("#id_subkegiatan").change(function () {
            let id_subkegiatan = $("#id_subkegiatan").val();
            $.ajax({
                type: "POST",
                url: '/admin/select-subkegiatan',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id_kode': id_subkegiatan,
                },
                dataType: 'json',
                cache: false,

                success: function (data) {

                    var html = '<option value=""></option>';
                    var i;

                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_uraian_subkegiatan + '>' + data[i]
                            .uraian + '</option>';
                    }
                    $('#Uraian').html(html);
                }
            });
        });

    });

</script>

@endsection
