@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('sasaran-utama.store')}}" method="post">
                @csrf
                
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Sasaran</label>
                    <div class="col-sm-8">
                        <input type="text" style="width:100%" name="sasaran_strategis" class="form-control @error('sasaran_strategis') is-invalid @enderror" id="sasaran_strategis" required/>
                        @error('sasaran_strategis')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Indikator Kinerja</label>
                    <div class="col-sm-8">
                        <input type="text" style="width:100%" name="indikator_kinerja" class="form-control @error('indikator_kinerja') is-invalid @enderror" id="indikator_kinerja" required/>
                        @error('indikator_kinerja')
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

                <div class="col-sm-offset-4 mt-4 text-center">
                    <button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Simpan</button>
                    <a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection

