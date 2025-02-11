@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('arsip.update', ['id' => $arsip->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Nama Dokumen</label>
                    <div class="col-sm-8">
                        <input type="text" style="width:100%" name="nama_arsip" class="form-control" value="{{ $arsip->nama_arsip }}" required/>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Keterangan</label>
                    <div class="col-sm-8">
                        <textarea name="keterangan" id="keterangan" class="form-control">{{ $arsip->keterangan }}</textarea>
                    </div>
                </div>
                {{-- <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">File</label>
                    <div class="col-sm-8">
                        <input type="file" accept=".xls,.xlsx,.doc,.docx,.ppt,.pptx,.pdf"  name="file" required>
                    </div>
                </div> --}}

                <div class="col-sm-offset-4 mt-4 text-center">
                    <button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Simpan</button>
                    <a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

