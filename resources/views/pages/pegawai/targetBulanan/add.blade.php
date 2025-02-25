@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <form class="px-5 py-5" action="{{ route('targetBulanan.store')}}" method="post">
                @csrf
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Indikator</label>
                    <div class="col-sm-8">
                        <select id="indikator_id" class="form-control" name="indikator_id" required>  
                            <option value=""></option>
                            @foreach ($indikators as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_indikator }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Januari</label>
                    <div class="col-sm-8">
                        <input type="number" style="width:100%" name="jan" class="form-control" value="0" required/>
                        @error('jan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Februari</label>
                    <div class="col-sm-8">
                        <input type="number" style="width:100%" name="feb" class="form-control" value="0" required/>
                        @error('feb')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Maret</label>
                    <div class="col-sm-8">
                        <input type="number" style="width:100%" name="mar" class="form-control" value="0" required/>
                        @error('mar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">April</label>
                    <div class="col-sm-8">
                        <input type="number" style="width:100%" name="apr" class="form-control" value="0" required/>
                        @error('apr')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Mei</label>
                    <div class="col-sm-8">
                        <input type="number" style="width:100%" name="mei" class="form-control" value="0" required/>
                        @error('mei')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Juni</label>
                    <div class="col-sm-8">
                        <input type="number" style="width:100%" name="jun" class="form-control" value="0" required/>
                        @error('jun')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Juli</label>
                    <div class="col-sm-8">
                        <input type="number" style="width:100%" name="jul" class="form-control" value="0" required/>
                        @error('jul')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Agustus</label>
                    <div class="col-sm-8">
                        <input type="number" style="width:100%" name="agu" class="form-control" value="0" required/>
                        @error('agu')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">September</label>
                    <div class="col-sm-8">
                        <input type="number" style="width:100%" name="sep" class="form-control" value="0" required/>
                        @error('sep')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Oktober</label>
                    <div class="col-sm-8">
                        <input type="number" style="width:100%" name="okt" class="form-control" value="0" required/>
                        @error('okt')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">November</label>
                    <div class="col-sm-8">
                        <input type="number" style="width:100%" name="nov" class="form-control" value="0" required/>
                        @error('nov')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4 control-label">Desember</label>
                    <div class="col-sm-8">
                        <input type="number" style="width:100%" name="des" class="form-control" value="0" required/>
                        @error('des')
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

