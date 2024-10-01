@extends('layouts.template')

@section('content')

<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
            <div class="btnback" style="text-align:right;margin-bottom:6px">
                <a href="{{ route('pegawai.index') }}" class="btn btn-primary btn-sm mt-2 py-2"><i class="icon-reply me-2"></i>Kembali</a>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>NIP</th>
                    <td>
                        {{ $pegawai->nip }}
                    </td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $pegawai->nama }}</td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>{{ $pegawai->jabatan }}</td>
                </tr>
                <tr>
                    <th colspan="2" style="text-align:center">Akun Login</th>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>{{ $pegawai->username }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

