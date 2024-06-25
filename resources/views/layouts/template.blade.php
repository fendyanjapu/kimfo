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
            <?php if (Session::get('level') == 'Admin'): ?>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('indexAdmin') }}">
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
                    <li><a class="dropdown-item" href="{{ route('rfk_kegiatan') }}">Kegiatan</a></li>
                    <li><a class="dropdown-item" href="{{ route('rfk_subkegiatan') }}">Sub Kegiatan</a></li>
                    <li><a class="dropdown-item" href="{{ route('uraian_subkegiatan') }}">Uraian Subkegiatan</a></li>
                    <li><a class="dropdown-item" href="{{ route('data_pegawai') }}">Pegawai</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="RencanaKas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="icon-book"></i><span>Rencana Kas Anggaran</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="RencanaKas">
                    <li><a class="dropdown-item" href="">Program</a></li>
                    <li><a class="dropdown-item" href="">Kegiatan</a></li>
                    <li><a class="dropdown-item" href="">Sub Kegiatan</a></li>
                    <li><a class="dropdown-item" href="">Uraian Subkegiatan</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('indexAdmin') }}">
                    <i class="icon-money"></i><span>Penggunaan Kas/Bukti Kegiatan</span>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="Pengendalian" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="icon-bar-chart"></i><span>Pengendalian</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="Pengendalian">
                    <li><a class="dropdown-item" href="">Program</a></li>
                    <li><a class="dropdown-item" href="">Kegiatan</a></li>
                    <li><a class="dropdown-item" href="">Sub Kegiatan</a></li>
                    <li><a class="dropdown-item" href="">Uraian Subkegiatan</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="">
                    <i class="icon-file"></i><span>Kartu Kendali</span>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="IKU" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="icon-bar-chart"></i><span>IKU</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="IKU">
                    <li><a class="dropdown-item" href="">Esselon 2</a></li>
                    <li><a class="dropdown-item" href="">Esselon 3</a></li>
                    <li><a class="dropdown-item" href="">Esselon 4</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="">
                    <i class="icon-list-alt"></i><span>Kinerja</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="{{ route('logout') }}">
                    <i class="icon-signout"></i><span>Keluar</span>
                </a>
              </li>

            <?php elseif (Session::get('level') == 'Pegawai'): ?>
            <?php else: ?>
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
