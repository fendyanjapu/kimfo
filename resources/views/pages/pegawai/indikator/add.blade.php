@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('indikator.store')}}" method="post">
                @csrf
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Sasaran</label>
                    <div class="col-sm-8">
                        <select id="sasaran" class="form-control" name="sasaran_id" required>  
                            <option value="">Pilih Sasaran</option>
                            @foreach ($sasarans as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_sasaran }}</option>
                            @endforeach
                         </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Indikator</label>
                    <div class="col-sm-8">
                        <input type="text" style="width:100%" name="nama_indikator" class="form-control @error('nama_indikator') is-invalid @enderror" id="nama" required/>
                        @error('nama_indikator')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Target</label>
                    <div class="col-sm-8">
                        <input type="text" style="width:100%" name="target" class="form-control @error('target') is-invalid @enderror" id="target" required/>
                        @error('target')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Satuan</label>
                    <div class="col-sm-8">
                        <input type="text" style="width:100%" name="satuan" class="form-control @error('satuan') is-invalid @enderror" id="satuan"/>
                        @error('satuan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Target Waktu</label>
                    <div class="col-sm-8">
                        <select name="target_waktu_id" id="target_waktu_id" class="form-control ct" required>
                            <option value=""></option>
                            @foreach ($targetWaktus as $targetWaktu)
                                <option value="{{ $targetWaktu->id }}">{{ $targetWaktu->target_waktu }}</option>
                            @endforeach
                        </select>
                        @error('target_waktu_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label" id="labelDari"></label>
                    <div class="col-sm-8">
                        <input type="hidden" style="width:100%" name="dari_bulan" class="form-control @error('dari_bulan') is-invalid @enderror" id="dari_bulan" placeholder="Dari Bulan"/>
                        @error('dari_bulan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label"></label>
                    <div class="col-sm-8">
                        <input type="hidden" style="width:100%" name="sampai_bulan" class="form-control @error('sampai_bulan') is-invalid @enderror" id="sampai_bulan" placeholder="Sampai Bulan"/>
                        @error('sampai_bulan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
    $(function(){
        $("#sasaran").select2();
    });

    $("#target_waktu_id").change(function(){
        let id = $(this).val();
        if (id == 3) {
            document.getElementById("dari_bulan").type="number";
            document.getElementById("sampai_bulan").type="number";
        } else {
            document.getElementById("dari_bulan").type="hidden";
            document.getElementById("sampai_bulan").type="hidden";
        }
        if (id == 1) {
            let target = $("#target").val();
            let cekNilai = target % 12;
            if (cekNilai != 0) {
                alert("Target Tidak Bisa Dibagi 12!");
                $("option:selected").prop("selected", false)
            }
        }
    });

    $("#target").keyup(function() {
        $('#target_waktu_id').prop('selectedIndex',0);
        // let target = $(this).val();
        // let cekNilai = target % 12;

        // if (cekNilai != 0) {
        //     $(".ct option[value='1']").remove();
        // }
    });
</script>


@endsection

