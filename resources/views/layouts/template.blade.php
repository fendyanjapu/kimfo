<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KIMFO</title>

  @include('includes.style')

</head>
<body>
  @include('sweetalert::alert')

  <nav class="subnavbar">
    <div class="subnavbar-inner">
      <div class="container">
        <ul class="mainnav">
          <?php if (auth()->user()->level == 'pegawai'): ?>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('dashboard') }}">
                <i class="icon-home"></i><span>Home</span>
            </a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="DataMaster" role="button" data-bs-toggle="dropdown" >
              <i class="icon-user"></i><span>Presensi</span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" aria-labelledby="DataMaster">
              
                <li><a class="dropdown-item" href="{{ route('presensi.index') }}">Presensi Masuk</a></li>
                <li><a class="dropdown-item" href="{{ route('presensi-pulang.index') }}">Presensi Pulang</a></li>
                
            </ul>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="DataMaster" role="button" data-bs-toggle="dropdown" >
              <i class="icon-book"></i><span>Pengumpulan</span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" aria-labelledby="DataMaster">
             
                {{-- <li><a class="dropdown-item" href="{{ route('sasaran-utama.index') }}">Sasaran dan Indikator Kinerja</a></li> --}}
             
                <li><a class="dropdown-item" href="{{ route('sasaran.index') }}">Sasaran</a></li>
                <li><a class="dropdown-item" href="{{ route('indikator.index') }}">Indikator</a></li>
                <li><a class="dropdown-item" href="{{ route('targetBulanan.index') }}">Target Bulanan</a></li>
                {{-- Upload arsip --}}
                <hr>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 1]) }}">Renstra</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 2]) }}">IKU</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 3]) }}">Renja</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 4]) }}">PK</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 5]) }}">Rencana Aksi</a></li>
                {{-- <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 6]) }}">DPA</a></li> --}}
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 7]) }}">Pohon Kinerja / Cascading</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 8]) }}">LHE</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 9]) }}">Laporan Monev</a></li>
                <hr>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 10]) }}">Lainnya</a></li>
              
                
            </ul>
        </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pengukuran" role="button" data-bs-toggle="dropdown" >
              <i class="icon-bar-chart"></i><span>Pengukuran</span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" aria-labelledby="pengukuran">
                <li><a class="dropdown-item" href="{{ route('kinerja_harian.index') }}">Kinerja Harian</a></li>
                <li><a class="dropdown-item" href="{{ route('capaianKinerja.index') }}">Capaian Kinerja</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="DataMaster" role="button" data-bs-toggle="dropdown" >
            <i class="icon-file"></i><span>Laporan</span>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu" aria-labelledby="DataMaster">
              <li><a class="dropdown-item" href="{{ route('laporanPresensi') }}">Presensi</a></li>
              <li><a class="dropdown-item" href="{{ route('laporanBulanan') }}">Bulanan</a></li>
          </ul>
      </li>

          {{-- <li class="nav-item">
            <a class="nav-link active" href="{{ route('evaluasi.index') }}">
                <i class="icon-list-alt"></i><span>Evaluasi</span>
            </a>
          </li> --}}

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="evaluasi" role="button" data-bs-toggle="dropdown" >
              <i class="icon-list-alt"></i><span>Evaluasi</span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" aria-labelledby="evaluasi">
              <li><a class="dropdown-item" href="{{ route('evaluasi.index') }}">Capaian Kinerja</a></li>
                <li><a class="dropdown-item" href="#">Kinerja Harian</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.presensi') }}">Presensi</a></li>
            </ul>
        </li>

          <li class="nav-item">
            <a class="nav-link active" href="{{ route('logout') }}">
                <i class="icon-signout"></i><span>Keluar</span>
            </a>
          </li>

          <?php endif ?>
          
            <?php if (auth()->user()->level == 'Admin'): ?>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard') }}">
                    <i class="icon-home"></i><span>Home</span>
                </a>
              </li>
             
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="DataMaster" role="button" data-bs-toggle="dropdown" >
                  <i class="icon-list"></i><span>Data Master</span>
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu" aria-labelledby="DataMaster">
                    <li><a class="dropdown-item" href="{{ route('rfk_program.index') }}">Program</a></li>
                    <li><a class="dropdown-item" href="{{ route('rfk_kegiatan.index') }}">Kegiatan</a></li>
                    <li><a class="dropdown-item" href="{{ route('rfk_subkegiatan.index') }}">Sub Kegiatan</a></li>
                    <li><a class="dropdown-item" href="{{ route('uraian_subkegiatan.index') }}">Uraian Subkegiatan</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.index') }}">Pegawai</a></li>
                    <li><a class="dropdown-item" href="{{ route('jabatan.index') }}">Jabatan</a></li>
                </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('admin.presensi') }}">
                  <i class="icon-user"></i><span>Presensi</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="DataMaster" role="button" data-bs-toggle="dropdown" >
                <i class="icon-book"></i><span>Pengumpulan</span>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu" aria-labelledby="DataMaster">
                  <li><a class="dropdown-item" href="{{ route('admin.sasaran') }}">Sasaran</a></li>
                  <li><a class="dropdown-item" href="{{ route('admin.indikator') }}">Indikator</a></li>
                  <li><a class="dropdown-item" href="{{ route('admin.targetBulanan') }}">Target Bulanan</a></li>
                  {{-- Upload arsip --}}
                  <hr>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 1]) }}">Renstra</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 2]) }}">IKU</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 3]) }}">Renja</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 4]) }}">PK</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 5]) }}">Rencana Aksi</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 6]) }}">DPA</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 7]) }}">Pohon Kinerja / Cascading</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 8]) }}">LHE</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 9]) }}">Laporan Monev</a></li>
                <li><a class="dropdown-item" href="{{ route('arsip.index', ['jenis_arsip_id' => 10]) }}">Lainnya</a></li>
              </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pengukuran" role="button" data-bs-toggle="dropdown" >
              <i class="icon-bar-chart"></i><span>Pengukuran</span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" aria-labelledby="pengukuran">
                <li><a class="dropdown-item" href="{{ route('admin.kinerjaHarian') }}">Kinerja Harian</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.capaianKinerja') }}">Capaian Kinerja</a></li>
            </ul>
        </li>

            {{-- <li class="nav-item">
              <a class="nav-link active" href="{{ route('admin.evaluasi') }}">
                  <i class="icon-list-alt"></i><span>Evaluasi</span>
              </a>
            </li> --}}

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="evaluasi" role="button" data-bs-toggle="dropdown" >
                <i class="icon-list-alt"></i><span>Evaluasi</span>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu" aria-labelledby="evaluasi">
                <li><a class="dropdown-item" href="{{ route('admin.evaluasi') }}">Capaian Kinerja</a></li>
                  <li><a class="dropdown-item" href="#">Kinerja Harian</a></li>
                  <li><a class="dropdown-item" href="#">Presensi</a></li>
              </ul>
          </li>

            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="RencanaKas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="icon-book"></i><span>Rencana Kas Anggaran</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="RencanaKas">
                    <li><a class="dropdown-item" href="{{ route('indexProgram') }}">Program</a></li>
                    <li><a class="dropdown-item" href="{{ route('indexKegiatan') }}">Kegiatan</a></li>
                    <li><a class="dropdown-item" href="{{ route('indexSubkegiatan') }}">Sub Kegiatan</a></li>
                    <li><a class="dropdown-item" href="{{ route('indexUraianSubkegiatan') }}">Uraian Subkegiatan</a></li>
                </ul>
              </li> --}}
              {{-- <li class="nav-item">
                <a class="nav-link active" href="{{ route('penggunaan_kas.index') }}">
                    <i class="icon-money"></i><span>Penggunaan Kas/Bukti Kegiatan</span>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="Pengendalian" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="icon-bar-chart"></i><span>Pengendalian</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="Pengendalian">
                    <li><a class="dropdown-item" href="{{ route('pengendalianProgram') }}">Program</a></li>
                    <li><a class="dropdown-item" href="{{ route('pengendalianKegiatan') }}">Kegiatan</a></li>
                    <li><a class="dropdown-item" href="{{ route('pengendalianSubkegiatan') }}">Sub Kegiatan</a></li>
                    <li><a class="dropdown-item" href="{{ route('pengendalianUraianSubkegiatan') }}">Uraian Subkegiatan</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="{{ route('kartuKendali') }}">
                    <i class="icon-file"></i><span>Kartu Kendali</span>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="IKU" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="icon-bar-chart"></i><span>IKU</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="IKU">
                    <li><a class="dropdown-item" href="{{ route('iku.index', ['i' => 2]) }}">Esselon 2</a></li>
                    <li><a class="dropdown-item" href="{{ route('iku.index', ['i' => 3]) }}">Esselon 3</a></li>
                    <li><a class="dropdown-item" href="{{ route('iku.index', ['i' => 4]) }}">Esselon 4</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="{{ route('kinerja_pegawai.index') }}">
                    <i class="icon-list-alt"></i><span>Kinerja</span>
                </a>
              </li> --}}

              <li class="nav-item">
                <a class="nav-link active" href="{{ route('logout') }}">
                    <i class="icon-signout"></i><span>Keluar</span>
                </a>
              </li>

            <?php endif; ?>
        </ul>
      </div>
      <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
 </nav>
  <!-- /subnavbar -->
  <div class="main" style="min-height: 600px">
    <div class="main-inner">
      <div class="container">
        <div class="row">
          <div class="span12">
            @yield('content')
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /main-inner -->
  </div>
  <!-- /main -->
  <div class="footer">
    <div class="footer-inner">
      <div class="container">
        <div class="row">
          <div class="span12"> &copy; 2024 <a href="#">Diskominfo Barito Kuala</a></div>
          <!-- /span12 -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /footer-inner -->
  </div>
  <!-- /footer -->
<!-- Le javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->

  @include('includes.main')

</body>
</html>
