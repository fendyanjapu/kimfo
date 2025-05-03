@extends('layouts.template')

@section('content')
    <div class="herocontent">
        <div class="row justify-content-center">
            <div class="col-md-8 shadow-xl bg-white rounded">
                <form class="px-5 py-5" action="{{ route('capaianKinerja.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Indikator</label>
                        <div class="col-sm-8">
                            <select id="indikator" class="form-control" name="indikator_id" required>
                                <option value=""></option>
                                @foreach ($indikators as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_indikator }}</option>
                                @endforeach
                            </select>
                            @error('indikator_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Sasaran Strategis</label>
                        <div class="col-sm-8">
                            <select name="bulan" id="" class="form-control">
                                <option value="jan" {{ date('m') == '01' ? 'selected' : '' }}>Januari</option>
                                <option value="feb" {{ date('m') == '02' ? 'selected' : '' }}>Februari</option>
                                <option value="mar" {{ date('m') == '03' ? 'selected' : '' }}>Maret</option>
                                <option value="apr" {{ date('m') == '04' ? 'selected' : '' }}>April</option>
                                <option value="mei" {{ date('m') == '05' ? 'selected' : '' }}>Mei</option>
                                <option value="jun" {{ date('m') == '06' ? 'selected' : '' }}>Juni</option>
                                <option value="jul" {{ date('m') == '07' ? 'selected' : '' }}>Juli</option>
                                <option value="agu" {{ date('m') == '08' ? 'selected' : '' }}>Agustus</option>
                                <option value="sep" {{ date('m') == '09' ? 'selected' : '' }}>Septembet</option>
                                <option value="okt" {{ date('m') == '10' ? 'selected' : '' }}>Oktober</option>
                                <option value="nov" {{ date('m') == '11' ? 'selected' : '' }}>November</option>
                                <option value="des" {{ date('m') == '12' ? 'selected' : '' }}>Desember</option>
                            </select>
                            @error('bulan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Jumlah Capaian</label>
                        <div class="col-sm-4">
                            <input type="number" style="width:100%" name="jumlah" class="form-control" required />
                            @error('jumlah')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <input type="text" style="width:100%" name="satuan" id="satuan" class="form-control" readonly />
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-4 control-label">Bukti Capaian</label>
                        <div class="col-sm-8">
                            <input type="file" accept="image/*, .xls,.xlsx,.doc,.docx,.ppt,.pptx,.pdf" name="bukti_capaian" required>
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
        $('#indikator').change(function(){
			let id = $(this).val();
			$.ajax({
				type   : "GET",
				data   : "id="+id,
				url    : "{{ route('getSatuan') }}",
				cache  : false,
				success: function(result){
                    let data = $.parseJSON(result);
					$('#satuan').val(data.satuan);
				}
			});
		});
    </script>


@endsection