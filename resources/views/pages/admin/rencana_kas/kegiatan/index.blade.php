@extends('layouts.template')

@section('content')
<script>
  $(document).ready(function(){
    $('#tabel').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
        }
    } );
  });
</script>
<h2>

    <div class="par-text">{{ $title }}</div>
    <div class="par-tex2">
</h2><br>

        <table id="tabel" class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th style="vertical-align: middle; text-align: center">NO</th>
      <th style="vertical-align: middle; text-align: center">{{ $title }}</th>
      <th style="vertical-align: middle; text-align: center">Pagu</th>
      <th style="vertical-align: middle; text-align: center">Triwulan I</th>
      <th style="vertical-align: middle; text-align: center">Triwulan II</th>
      <th style="vertical-align: middle; text-align: center">Triwulan III</th>
      <th style="vertical-align: middle; text-align: center">Triwulan IV</th>

     </tr>

  </thead>
  <tbody>
    @foreach ($kegiatans as $item)
        <tr>
            <td style="text-align: center">{{ $loop->iteration }}</td>
            <td>{{ $item->kegiatan }}</td>
            <td style="text-align: right">
                {{ $item->jumlah ? 'Rp ' . number_format($item->jumlah) : 'Rp. 0' }}
            </td>
            <td style="text-align: right">
                {{ $item->jumlahI ? 'Rp ' . number_format($item->jumlahI) : 'Rp. 0' }}
            </td>
            <td style="text-align: right">
                {{ $item->jumlahII ? 'Rp ' . number_format($item->jumlahII) : 'Rp. 0' }}
            </td>
            <td style="text-align: right">
                {{ $item->jumlahIII ? 'Rp ' . number_format($item->jumlahIII) : 'Rp. 0' }}
            </td>
            <td style="text-align: right">
                {{ $item->jumlahIV ? 'Rp ' . number_format($item->jumlahIV) : 'Rp. 0' }}
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection
