@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('hariLibur.store')}}" method="post">
                @csrf
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Tanggal Libur</label>
                    <div class="col-sm-8">
                        <input type="date" style="width:100%" name="tanggal_libur" class="form-control @error('tanggal_libur') is-invalid @enderror" id="tanggal_libur" required/>
                        @error('tanggal_libur')
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

