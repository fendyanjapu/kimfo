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
    <div class="par-text">Program</div>
    <div class="par-tex2">
</h2><br>
<a href="{{ route('rfk_program.create') }}"
        class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"></i>Tambah</i></a>
        <table id="tabel" class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th style="vertical-align: middle; text-align: center">NO</th>
      <th style="vertical-align: middle; text-align: center">Kode</th>
      <th style="vertical-align: middle; text-align: center">Sasaran</th>
      <th style="vertical-align: middle; text-align: center">Program</th>
      <th style="vertical-align: middle; text-align: center">Indikator Kinerja Program (Outcome/Kegiatan Output)</th>
      <th style="vertical-align: middle; text-align: center">Kode Rekening</th>
      <th style="vertical-align: middle; text-align: center">Pagu Program</th>

      <th style="vertical-align: middle; text-align: center" width="15px">#</th>
     </tr>

  </thead>
  <tbody>
    @foreach ($data as $key)
      <tr>
        <td style="text-align: center">{{ $loop->iteration }}</td>
        <td>{{ $key->kode_a }} {{ $key->kode_b }} {{ $key->program_kode }}</td>
        <td>{{ $key->sasaran }}</td>
        <td>{{ $key->program }}</td>
        <td>{{ $key->indikator_kinerja }}</td>
        <td>{{ $key->kode_rekening }}</td>
        <td style="text-align: right">
          @if ($key->pagu_program != '')
          Rp {{ number_format($key->pagu_program) }}
          @endif
        {{-- <?php
                $this->db->select('SUM(pagu) as jumlah');
                $this->db->from('uraian_subkegiatan');
                $this->db->where('id_program', $key->id_program);
                $row = $this->db->get()->row();
                echo $row->jumlah != '' ? "Rp ".number_format($row->jumlah) : '';
            ?> --}}
        </td>

        <td style="text-align: center">
                <a href="{{ route('rfk_program.edit', $key->id_program) }}" class="btn btn-success btn-sm" title="Edit"><i class="icon-pencil"></i></a>

                <a href="{{ route('rfk_program.destroy', $key->id_program) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
                    <i class="icon-trash"></i>
                </a>
            </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
