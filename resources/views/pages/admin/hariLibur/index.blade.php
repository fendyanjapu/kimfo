@extends('layouts.template')

@section('content')
    <script>
        $(document).ready(function () {
            $('#tabel').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
                }
            });
        });
    </script>
    <h2>
        <div class="par-text">Hari Libur</div>
        <div class="par-tex2">
    </h2><br>
    <a href="{{ route('hariLibur.create') }}" class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1">
            Tambah</i></a>
    <table id="tabel" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="vertical-align: middle; text-align: center" width="15px">NO</th>
                <th style="vertical-align: middle; text-align: center">Tanggal Libur</th>
                <th style="vertical-align: middle; text-align: center" width="15px">#</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($query as $key)
                <tr>
                    <td style="text-align: center" style="width:1%">{{ $loop->iteration }}</td>
                    <td style="width:20%"><?= $key->tanggal_libur ?></td>
                    <td style="text-align: center">

                        {{-- <a href="{{ route('hariLibur.edit', ['harilibur' => $key->id]) }}" class="btn btn-success btn-sm mt-1"
                            title="edit"><i class="icon-pencil"></i></a> --}}
                        <a href="{{ route('hariLibur.destroy', $key->id) }}" class="btn btn-danger btn-sm mt-1"
                            data-confirm-delete="true">
                            <i class="icon-trash"></i>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection