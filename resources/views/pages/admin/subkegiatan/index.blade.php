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
    <div class="par-text">Subkegiatan</div>
    <div class="par-tex2">
</h2><br>
<a href="{{ route('rfk_subkegiatan.create') }}"
      class="btn btn-primary mb-4" title="Tambah"><i class="icon-plus me-1"></i>Tambah</a>

        <table id="tabel" class="table table-striped table-bordered" >
  <thead>
    <tr>
      <tr>
        <th style="vertical-align: middle; text-align: center" width="15px">NO</th>
        <th style="vertical-align: middle; text-align: center">Kode</th>
        <th style="vertical-align: middle; text-align: center">Sasaran</th>
        <th style="vertical-align: middle; text-align: center">Program</th>
        <th style="vertical-align: middle; text-align: center">Kegiatan</th>
        <th style="vertical-align: middle; text-align: center">Subkegiatan</th>
        <th style="vertical-align: middle; text-align: center">Indikator Kinerja Program (Outcome/Kegiatan Output)</th>
        <th style="vertical-align: middle; text-align: center">Pagu Subkegiatan</th>
        <th style="vertical-align: middle; text-align: center" width="15px">#</th>
     </tr>

  </thead>
  <tbody>
    @foreach ($rfk_subkegiatan as $key)
    @php
        $ka = $key->kegiatan->program->kode_a;
        $kb = $key->kegiatan->program->kode_b;
        $p = $key->kegiatan->program->program_kode;
        $kk = $key->kegiatan->kegiatan_kode;
        $skk = $key->subkegiatan_kode;
        $kode = $ka .' '. $kb .' '. $p . ' ' . $kk . ' ' . $skk;

    @endphp
      <tr>
        <td style="text-align: center">{{ $loop->iteration }}</td>
        <td>{{ $kode }}</td>
        <td>{{ $key->subkegiatan_sasaran }}</td>
        <td>
            {{ optional(optional($key->kegiatan)->program)->program ?? '' }}
        </td>
        <td>{{ $key->kegiatan->kegiatan }}</td>
        <td>{{ $key->subkegiatan }}</td>
        <td>{{ $key->subkegiatan_indikator_kinerja }}</td>

        <td style="text-align: right">
        {{-- <?php
                $this->db->select('SUM(pagu) as jumlah');
                $this->db->from('uraian_subkegiatan');
                $this->db->where('id_program', $key->id_program);
                $row = $this->db->get()->row();
                echo $row->jumlah != '' ? "Rp ".number_format($row->jumlah) : '';
            ?> --}}
        </td>

        <td style="text-align: center">
                <a href="{{ route('rfk_subkegiatan.edit', $key->id_subkegiatan) }}" class="btn btn-success btn-sm mt-1" title="Edit"><i class="icon-pencil"></i></a>

                <a href="{{ route('rfk_subkegiatan.destroy', $key->id_subkegiatan) }}" class="btn btn-danger btn-sm mt-1" data-confirm-delete="true">
                    <i class="icon-trash"></i>
                </a>
            </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
