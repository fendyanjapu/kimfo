@extends('layouts.template')

@section('content')
    <div class="herocontent">
        <div class="row justify-content-center">
            <div class="col-md-8 shadow-xl bg-white rounded">
                <form class="px-5 py-5" action="{{ route('targetBulanan.update', ['targetBulanan' => $targetBulanan])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Indikator</label>
                        <div class="col-sm-8">
                            <select id="indikator" class="form-control" name="indikator_id" required>
                                <option value=""></option>
                                @foreach ($indikators as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $targetBulanan->indikator_id ? 'selected' : '' }}>
                                        {{ $item->nama_indikator }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Januari</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="jan" id="jan" class="form-control" value="{{ $targetBulanan->jan }}"
                                required />
                            @error('jan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Februari</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="feb" id="feb" class="form-control" value="{{ $targetBulanan->feb }}"
                                required />
                            @error('feb')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Maret</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="mar" id="mar" class="form-control" value="{{ $targetBulanan->mar }}"
                                required />
                            @error('mar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">April</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="apr" id="apr" class="form-control" value="{{ $targetBulanan->apr }}"
                                required />
                            @error('apr')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Mei</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="mei" id="mei" class="form-control" value="{{ $targetBulanan->mei }}"
                                required />
                            @error('mei')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Juni</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="jun" id="jun" class="form-control" value="{{ $targetBulanan->jun }}"
                                required />
                            @error('jun')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Juli</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="jul" id="jul" class="form-control" value="{{ $targetBulanan->jul }}"
                                required />
                            @error('jul')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Agustus</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="agu" id="agu" class="form-control" value="{{ $targetBulanan->agu }}"
                                required />
                            @error('agu')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">September</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="sep" id="sep" class="form-control" value="{{ $targetBulanan->sep }}"
                                required />
                            @error('sep')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Oktober</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="okt" id="okt" class="form-control" value="{{ $targetBulanan->okt }}"
                                required />
                            @error('okt')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">November</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="nov" id="nov" class="form-control" value="{{ $targetBulanan->nov }}"
                                required />
                            @error('nov')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Desember</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="des" id="des" class="form-control" value="{{ $targetBulanan->des }}"
                                required />
                            @error('des')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Jumlah</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="jumlah" id="jumlah" class="form-control" value=""
                                readonly />
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Target</label>
                        <div class="col-sm-8">
                            <input type="number" style="width:100%" name="target" id="target" class="form-control" value="{{ $target }}"
                                readonly />
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
            let jan = $("#jan").val();
            let feb = $("#feb").val();
            let mar = $("#mar").val();
            let apr = $("#apr").val();
            let mei = $("#mei").val();
            let jun = $("#jun").val();
            let jul = $("#jul").val();
            let agu = $("#agu").val();
            let sep = $("#sep").val();
            let okt = $("#okt").val();
            let nov = $("#nov").val();
            let des = $("#des").val();
            let jumlah = parseInt(jan) + parseInt(feb) + parseInt(mar) + 
            parseInt(apr) + parseInt(mei) + parseInt(jun) + parseInt(jul) + 
            parseInt(agu) + parseInt(sep) + parseInt(okt) + parseInt(nov) + parseInt(des);
            $("#jumlah").val(jumlah);
        });
        $("input").change(function () {
            let jan = $("#jan").val();
            let feb = $("#feb").val();
            let mar = $("#mar").val();
            let apr = $("#apr").val();
            let mei = $("#mei").val();
            let jun = $("#jun").val();
            let jul = $("#jul").val();
            let agu = $("#agu").val();
            let sep = $("#sep").val();
            let okt = $("#okt").val();
            let nov = $("#nov").val();
            let des = $("#des").val();
            let jumlah = parseInt(jan) + parseInt(feb) + parseInt(mar) + 
            parseInt(apr) + parseInt(mei) + parseInt(jun) + parseInt(jul) + 
            parseInt(agu) + parseInt(sep) + parseInt(okt) + parseInt(nov) + parseInt(des);
            $("#jumlah").val(jumlah);
        });

        $('#indikator').change(function(){
			let id = $(this).val();
			$.ajax({
				type   : "GET",
				data   : "id="+id,
				url    : "{{ route('getTarget') }}",
				cache  : false,
				success: function(result){
                    let data = $.parseJSON(result);
					$('#target').val(data.target);
				}
			});
		});
    </script>


@endsection