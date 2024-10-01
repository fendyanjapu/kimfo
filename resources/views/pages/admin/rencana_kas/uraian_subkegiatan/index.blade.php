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
<a href="{{ route('createUraianSubkegiatan') }}"
        class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"></i>Tambah</i></a>
        <table id="tabel" class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th style="vertical-align: middle; text-align: center">NO</th>
      <th style="vertical-align: middle; text-align: center">Sub Kegiatan</th>
      <th style="vertical-align: middle; text-align: center">Uraian</th>
      <th style="vertical-align: middle; text-align: center">Pagu</th>
      <th style="vertical-align: middle; text-align: center">Triwulan I</th>
      <th style="vertical-align: middle; text-align: center">Triwulan II</th>
      <th style="vertical-align: middle; text-align: center">Triwulan III</th>
      <th style="vertical-align: middle; text-align: center">Triwulan IV</th>
      <th style="vertical-align: middle; text-align: center" width="15px">#</th>

     </tr>

  </thead>
  <tbody>
    @foreach ($query as $item)
        <tr>
            <td style="text-align: center">{{ $loop->iteration }}</td>
            <td>{{ $item->subkegiatan }}</td>
            <td>{{ $item->uraian }}</td>
            <td style="text-align: right">
                {{ $item->pagu ? 'Rp ' . number_format($item->pagu) : 'Rp. 0' }}
            </td>
            <td style="text-align: right">
                {{ $item->triwulan_i ? 'Rp ' . number_format($item->triwulan_i) : 'Rp. 0' }}
            </td>
            <td style="text-align: right">
                {{ $item->triwulan_ii ? 'Rp ' . number_format($item->triwulan_ii) : 'Rp. 0' }}
            </td>
            <td style="text-align: right">
                {{ $item->triwulan_iii ? 'Rp ' . number_format($item->triwulan_iii) : 'Rp. 0' }}
            </td>
            <td style="text-align: right">
                {{ $item->triwulan_iv ? 'Rp ' . number_format($item->triwulan_iv) : 'Rp. 0' }}
            </td>

            <td style="text-align: center">
                <a href="{{ route('editUraianSubkegiatan', $item->id_rencana_kas) }}" class="btn btn-success btn-sm" title="Edit"><i class="icon-pencil"></i></a>

                <a href="{{ route('deleteUraianSubkegiatan', $item->id_rencana_kas) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
                    <i class="icon-trash"></i>
                </a>
            </div>
        </td>

        </tr>
    @endforeach
  </tbody>
</table>
@endsection
