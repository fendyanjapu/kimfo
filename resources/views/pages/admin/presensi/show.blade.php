@extends('layouts.template')

@section('content')
<div class="herocontent">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-xl bg-white rounded">
                
                @foreach ($presensi as $item)
                <div class="col-sm-offset-4 mt-4 text-center">
                    <img src="{{ url('/upload/presensi/'.$item->gambar) }}" height="300"/>
                </div>
                <div class="col-sm-offset-4 mt-4 text-center">
                    <p>{{ $item->created_at }}</p>
                </div>
                @endforeach

                <div class="col-sm-offset-4 mt-4 text-center">
                    <a href="#" class="btn btn-danger" onClick="self.history.back()">Kembali</a>
                </div>
                <br>
        </div>
    </div>
</div>

@endsection

