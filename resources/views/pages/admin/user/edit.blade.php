@extends('layouts.template')

@section('content')
<Style>
    @media only screen and (min-width: 600px) {
        .col-12 {
            width:100%;
        }
    }
      @media only screen and (min-width: 992px) {
        .col-12 {
            margin:0 auto;
            width:30%;
        }
    }
</Style>

<form action="{{ route('user.update', ['user' => $user]) }}" method="post">
    @csrf
	@method('PUT')

	<div class="row">
        
		<div class="col-12 col-md-8">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nip</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="nip" class="form-control" id="nip" value="<?=$user->nip?>" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="nama" class="form-control" id="nama" value="<?=$user->nama?>" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jabatan</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="jabatan" class="form-control" id="jabatan" value="<?=$user->jabatan?>" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Username Login</label>
				<div class="col-sm-12">
					<input type="text" style="width:100%" name="username" class="form-control" id="username" value="<?=$user->username?>"  required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Password</label>
				<div class="col-sm-12">
					<input type="password" id="password" style="width:100%" class="form-control" name="password" placeholder="Masukan password jika ingin diubah">
					<input type="hidden" id="password" style="width:100%" class="form-control" name="password_lama" value="{{ $user->password }}">
				</div>
			</div>
			<br>
			<div class="col-sm-offset-2">
				<button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Simpan</button>
			<a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
			</div>
		</div>
	</div>
	
</form><br><br>
@endsection