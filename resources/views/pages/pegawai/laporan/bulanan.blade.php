@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('laporanBulanan.print')}}" method="get" target="_blank">
                @csrf
                
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Bulan</label>
                    <div class="col-sm-8">
                        <select name="bulan" id="bulan" class="form-control">
                            <option></option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Foto 1</label>
                    <div class="col-sm-8">
                        <select name="foto1" id="foto1" class="form-control" required></select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Foto 2</label>
                    <div class="col-sm-8">
                        <select name="foto2" id="foto2" class="form-control" required></select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Foto 3</label>
                    <div class="col-sm-8">
                        <select name="foto3" id="foto3" class="form-control" required></select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Foto 4</label>
                    <div class="col-sm-8">
                        <select name="foto4" id="foto4" class="form-control" required></select>
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
    $('#bulan').change(function() {
        let bulan = $(this).val();
        $.ajax({
            type: "GET",
            data: "bulan="+bulan,
            url: "{{ route('getKinerja') }}",
            cache: false,
            success: function(result) {
                $('#foto1').html(result);
                $('#foto2').html(result);
                $('#foto3').html(result);
                $('#foto4').html(result);
            }
        });
    })
</script>

@endsection

