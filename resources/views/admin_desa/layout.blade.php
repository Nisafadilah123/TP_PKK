<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('admin/plugins/fontawesome-free/css/all.min.css') }}" />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />

 <!-- DataTables -->
 {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"/> --}}
  <link rel="stylesheet" href="{{url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

<!-- Favicons -->
<link href="{{ url ('image/remove.png') }}" rel="icon" />
<link href="{{ url ('image/remove.png') }}" rel="apple-touch-icon" />

    <!-- Tempusdominus Bbootstrap 4 -->
    <link
      rel="stylesheet"
      href="{{ url('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"
    />
    <!-- iCheck -->
    <link
      rel="stylesheet"
      href="{{ url('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"
    />
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('admin/plugins/jqvmap/jqvmap.min.css') }}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admin/dist/css/adminlte.min.css') }}" />
    <!-- overlayScrollbars -->
    <link
      rel="stylesheet"
      href="{{ url('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"
    />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('admin/plugins/daterangepicker/daterangepicker.css') }}" />
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('admin/plugins/summernote/summernote-bs4.css') }}" />
    <!-- Google Font: Source Sans Pro -->
    <link
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
      rel="stylesheet"
    />
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
              ><i class="fas fa-bars"></i
            ></a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/dashboard" class="brand-link">
          <img
            src="{{ url ('image/remove.png') }}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
          />
          <span class="brand-text font-weight-light">TP PKK Desa</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
              <a href="#" class="d-block">{{ (Auth::user()->name) }}</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
               <li class="nav-item has-treeview">
                <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active':'' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-folder"></i>
                  <p>Data Kategori
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/kategori_industri" class="nav-link {{ Request::is('kategori_industri') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kategori Industri Rumah</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/kategori_pemanfaatan" class="nav-link {{ Request::is('kategori_pemanfaatan') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kategori Pemanfaatan <br>Tanah Pekarangan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/keluarga" class="nav-link {{ Request::is('eluarga') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data e</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pemanfaatan" class="nav-link {{ Request::is('pemanfaatan') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Pemanfaatan Tanah <br> Pekarangan PKK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/data_sekretariat" class="nav-link {{ Request::is('data_sekretariat') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Sekretariat/<br>Data Umum</p>
                    </a>
                  </li>

                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-landmark"></i>
                  <p>Data Aset Desa/ <br>Kelurahan
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/warung" class="nav-link {{ Request::is('warung') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Warung PKK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/data_warung" class="nav-link {{ Request::is('data_warung') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Komoditi/<br> Usaha Warung PKK</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/taman_bacaan" class="nav-link {{ Request::is('taman_bacaan') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Taman Bacaan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/data_taman_bacaan" class="nav-link {{ Request::is('data_taman_bacaan') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Jenis Buku <br>Taman Bacaan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/data_aset_koperasi" class="nav-link {{ Request::is('data_aset_koperasi') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Koperasi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/kejar_paket" class="nav-link {{ Request::is('kejar_paket') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kejar Paket</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/posyandu" class="nav-link {{ Request::is('posyandu') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Posyandu</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/data_kegiatan_posyandu" class="nav-link {{ Request::is('data_kegiatan_posyandu') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Posyandu</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/kelompok_simulasi" class="nav-link {{ Request::is('kelompok_simulasi') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kelompok Simulasi dan <br> Penyuluhan</p>
                    </a>
                  </li>

                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Data Kegiatan POKJA
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/data_pokja1" class="nav-link {{ Request::is('data_pokja1') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data POKJA I</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/data_pokja2" class="nav-link {{ Request::is('data_pokja2') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data POKJA II</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/data_pokja3" class="nav-link {{ Request::is('data_pokja3') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data POKJA III</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/data_pokja4" class="nav-link {{ Request::is('data_pokja4') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data POKJA IV</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/data_sekretariat" class="nav-link {{ Request::is('data_sekretariat') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Sekretariat/<br>Data Umum</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="/data_kader" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p>Data Kader TP PKK</p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-archive"></i>
                  <p>
                        Data Rekapitulasi
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/data_kelompok_dasa_wisma" class="nav-link {{ Request::is('data_kelompok_dasa_wisma') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Rekapitulasi Catatan Data <br> dan Kegiatan Warga <br> Kelompok Dasa Wisma</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/rekap_kelompok_pkk_rt" class="nav-link {{ Request::is('rekap_kelompok_pkk_rt') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Rekapitulasi Catatan Data <br> dan Kegiatan Warga <br> Kelompok PKK RT</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/rekap_kelompok_pkk_rw" class="nav-link {{ Request::is('rekap_kelompok_pkk_rw') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Rekapitulasi Catatan Data <br> dan Kegiatan Warga <br> Kelompok PKK RW</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/rekap_kelompok_pkk_dusun" class="nav-link {{ Request::is('rekap_kelompok_pkk_dusun') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Rekapitulasi Catatan Data <br> dan Kegiatan Warga <br> Kelompok PKK Dusun/Ling</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/rekap_kelompok_pkk_desa" class="nav-link {{ Request::is('rekap_kelompok_pkk_desa') ? 'active':'' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Rekapitulasi Catatan Data <br> dan Kegiatan Warga <br> Kelompok PKK Desa</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="/laporan" class="nav-link">
                    <i class="nav-icon fas fa-folder-open"></i>
                  <p>Data Laporan</p>
                </a>
              </li>



              {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    Keluar
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_desa.logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    Keluar
                </a>

                <form id="logout-form" action="{{ route('admin_desa.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>@yield('bread')</h1> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">@yield('bread')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      @yield('container')

</div>

      <footer class="main-footer">
        <strong
          >Copyright &copy; Admin PKK Desa.</strong
        >
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          {{-- <b>Version</b> 3.0.5 --}}
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ url('admin/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('admin/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ url('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('admin/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('admin/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('admin/dist/js/demo.js') }}"></script>
    <!-- DataTables -->
    {{-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> --}}
    <script src="{{url('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

    </script>

    @stack('script-addon')
    @include('sweetalert::alert')

    @yield('script')

  </body>
</html>
