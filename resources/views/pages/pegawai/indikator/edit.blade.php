@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('indikator.update', ['indikator' => $indikator])}}" method="post">
                @csrf
				@method('PUT')
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Sasaran</label>
                    <div class="col-sm-8">
                        <select id="sasaran" class="form-control" name="sasaran_id" required>  
                            <option value=""></option>
                            @foreach ($sasarans as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $indikator->sasaran_id ? 'selected' : '' }}>{{ $item->nama_sasaran }}</option>
                            @endforeach
                         </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Indikator</label>
                    <div class="col-sm-8">
                        <input type="text" style="width:100%" name="nama_indikator" class="form-control" value="{{ $indikator->nama_indikator }}" id="nama_indikator" required/>
                        @error('nama_indikator')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Target</label>
                    <div class="col-sm-8">
                        <input type="text" style="width:100%" name="target" class="form-control" id="target" value="<?= $indikator->target ?>" required/>
                    </div>
                </div>
    
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Satuan</label>
                    <div class="col-sm-8">
                        <input type="text" style="width:100%" name="satuan" class="form-control" id="satuan" value="<?= $indikator->satuan ?>"/>
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
   </script>


@endsection

