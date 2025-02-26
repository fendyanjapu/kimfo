@extends('layouts.template')

@section('content')
  <script>
    $(document).ready(function () {
    $('#tabel').DataTable({
      scrollX: true,
      scrollY: true,
      
      dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    orientation: 'portrait',
                    pageSize: 'A4'
                },
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'print',
                // 'colvis',
            ]
        });
    });
  </script>
  <h2>
    <div class="par-text">Data Pegawai</div>
    <div class="par-tex2">
  </h2><br>
  <a href="{{ route('user.create') }}" class="btn btn-primary mb-4" title="Tambah"><i
    class="icon-plus me-1"></i>Tambah</i></a>
  <table id="tabel" class="table table-striped table-bordered">
    <thead>
    <tr>
      <th style="vertical-align: middle; text-align: center" width="15px">No</th>
      <th style="vertical-align: middle; text-align: center">Nama</th>
      <th style="vertical-align: middle; text-align: center">Username</th>
      <th style="vertical-align: middle; text-align: center">Password</th>
      <th style="vertical-align: middle; text-align: center" width="15px">#</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($user as $item)
    <tr>
      <td style="text-align: center;width:1%">{{ $loop->iteration }}</td>
      <td style="text-align: center;">{{ $item->nama }}</td>
      <td style="text-align: center;">Username: {{ $item->username }}</td>
      <td style="text-align: center;">Password: Batola2025#</td>
      <td style="text-align: center">
      <a href="{{ route('user.show', $item->id) }}" class="btn btn-secondary btn-sm mt-1" title="lihat"><i
      class="icon-eye-open"></i></a>
      <a href="{{ route('user.edit', ['user' => $item->id]) }}" class="btn btn-success btn-sm mt-1" title="edit"><i
      class="icon-pencil"></i></a>

      <a href="{{ route('user.destroy', $item->id) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
      <i class="icon-trash"></i>
      </a>
      </td>
    </tr>
  @endforeach
    </tbody>
  </table>

@endsection