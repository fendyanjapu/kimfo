@extends('layouts.template')

@section('content')
    <script>
        $(document).ready(function () {
            $('#tabel').DataTable({
                scrollX: true,
                scrollY: true,
                stateSave: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
                }
            });
        });
    </script>
    <h2>
        <div class="par-text">Evaluasi Capaian Kinerja</div>
        <br>
        <div class="par-tex2"><h3>{{ $nama }}</h3>
            <br>
    </h2><br>

    <table id="tabel" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="vertical-align: middle; text-align: center" width="15px">No</th>
                <th style="vertical-align: middle; text-align: center">Indikator Kinerja</th>
                <th style="vertical-align: middle; text-align: center">Target</th>
                <th style="vertical-align: middle; text-align: center">Jumlah Capaian</th>
                <th style="vertical-align: middle; text-align: center">Satuan</th>
                {{-- <th style="vertical-align: middle; text-align: center">Bukti Capaian</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($query as $item)
                <tr>
                    <td style="text-align: center;width:1%">{{ $loop->iteration }}</td>
                    <td style="text-align: center;">{{ $item->nama_indikator }}</td>
                    <td style="text-align: center;">{{ $target[$item->id] }}</td>
                    <td style="text-align: center;">{{ $capaian[$item->id] }}</td>
                    <td style="text-align: center;">{{ $item->satuan }}</td>
                    {{-- <td style="text-align: center; width:10%">
                        <a href="{{ env('APP_URL') . 'upload/bukti_capaian/' . $item->bukti_capaian }}"
                            class="btn btn-default btn-sm mt-1" title="lihat" target="_blank">
                            <i class="icon-file" aria-hidden="true"></i>
                        </a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="#" onclick="self.history.back()" class="btn btn-danger btn-sm mt-1">Kembali</a>

@endsection