@extends('layouts.template')
@section('content')
    <center>
        <h1>Selamat Datang, {{ $nama }}</h1>
        <br>
        <img src="{{ asset('assets/assets2/img/logo.jpeg') }}" height="500px" width="500px">
        <br><br>
        <h1>Aplikasi Pemantauan Kinerja Dinas Kominfo</h1>
    </center>
@endsection


