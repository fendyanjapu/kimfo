@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('presensi-pulang.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Foto Presensi Pulang</label>
                    <div class="col-sm-8">
                        <input type="file" accept="image/*" capture="user" name="gambar" required>
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

