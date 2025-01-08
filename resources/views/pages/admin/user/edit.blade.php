@extends('layouts.template')

@section('content')

<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">

<form class="px-5 py-5" action="{{ route('user.update', ['user' => $user]) }}" method="post">
    @csrf
	@method('PUT')

	<div class="form-group row mt-3">
		<label class="col-sm-4 control-label">Nip</label>
		<div class="col-sm-8">
			<input type="text" style="width:100%" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" value="{{ $user->nip }}" required/>
			@error('nip')
				<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="form-group row mt-3">
		<label class="col-sm-4 control-label">Nama</label>
		<div class="col-sm-8">
			<input type="text" style="width:100%" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $user->nama }}" required/>
			@error('nama')
				<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
	<div class="form-group row mt-3">
		<label class="col-sm-4 control-label">Jabatan</label>
		<div class="col-sm-8">
			<select style="width:100%" name="jabatan_id" class="form-control">
				<option value=""></option>
				@foreach ($jabatan as $item)
					<option value="{{ $item->id }}" {{ $item->id == $user->jabatan_id ? "selected" : "" }}>
						{{ $item->nama_jabatan }}
					</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group row mt-3">
		<label class="col-sm-4 control-label">Atasan</label>
		<div class="col-sm-8">
			<select style="width:100%" name="atasan" class="form-control">
				<option value=""></option>
				@foreach ($jabatan as $item)
					<option value="{{ $item->id }}" {{ $item->id == $user->atasan ? "selected" : "" }}>
						{{ $item->nama_jabatan }}
					</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group row mt-3 border-top pt-3">
			<label class="col-sm-4 control-label">Username Login</label>
			<div class="col-sm-8">
				<input type="text" style="width:100%" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ $user->username }}" required/>
				@error('username')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
	</div>
	{{-- <div class="form-group row mt-3">
			<label class="col-sm-4 control-label">Password</label>
			<div class="col-sm-8">
				<div class="input-group">
					<input type="password" class="form-control @error('password') is-invalid @enderror"
					id="password" name="password">
					<div class="input-group-append">
					<span class="input-group-text" id="togglePassword">
						<i class="icon-eye-close" style="height: 25px;margin-top:6px"></i>
					</span>
					</div>
				</div>
				@error('password')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
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

<br><br>
@endsection