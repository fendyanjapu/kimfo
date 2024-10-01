@extends('layouts.template')
@section('content')


<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">

            <form class="px-5 py-5" action="{{ route('rfk_program.update', $dProgram->id_program) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label control"><b>Kode</b></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="kode_a" value="{{ $dProgram->kode_a }}">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="kode_b" value="{{ $dProgram->kode_b }}">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="program_kode" value="{{ $dProgram->program_kode }}">
                    </div>
                  </div>

                <div class="form-group row mt-3">
                    <label for="sasaran" class="col-sm-4 col-form-label control"><b>Sasaran</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sasaran" value="{{ $dProgram->sasaran }}">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="program" class="col-sm-4 col-form-label control"><b>Program</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="program" value="{{ $dProgram->program }}">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="indikator_kinerja" class="col-sm-4 col-form-label control"><b>Indikator Kinerja Program (Outcome/Kegiatan Output)</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="indikator_kinerja" value="{{ $dProgram->indikator_kinerja }}">
                    </div>
                </div>

                <div class="form-group row mt-1">
                    <label for="kode_rekening" class="col-sm-4 col-form-label control"><b>Kode Rekening</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="kode_rekening" value="{{ $dProgram->kode_rekening }}">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="pagu_program" class="col-sm-4 col-form-label control"><b>Pagu Program</b></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="pagu_program" value="{{ $dProgram->pagu_program }}">
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
