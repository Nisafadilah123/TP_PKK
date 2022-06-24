<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>@yield('title')</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ url ('image/remove.png') }}" rel="icon" />
    <link href="{{ url ('image/remove.png') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="{{ url ('assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link
      href="{{ url ('assets/vendor/bootstrap/css/bootstrap.min.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ url ('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
      rel="stylesheet"
    />
    <link href="{{ url ('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link
      href="{{ url ('assets/vendor/glightbox/css/glightbox.min.css') }}"
      rel="stylesheet"
    />
    <link href="{{ url ('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ url ('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ url ('assets/css/style.css') }}" rel="stylesheet" />

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo">
          <a href="/"><img src="{{ url('../image/2.png') }}" alt="" /></a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
          <ul>
            <li>
              <a class="nav-link scrollto active" href="/">Beranda</a>
            </li>
            <li class="dropdown">
              <a href="#service"
                ><span>Profile</span> <i class="bi bi-chevron-down"></i
              ></a>
              <ul>
                <li><a href="/sejarah">Sejarah PKK</a></li>
                <li><a href="/program">10 Program PKK</a></li>
                <li><a href="/arti">Arti dan Lambang PKK</a></li>
                <li>
                  <a href="/visi">Visi & Misi TP Kab. Indramayu</a>
                </li>
                <li class="dropdown">
                  <a href="#"
                    ><span>Bagan Mekanisme Gerakkan PKK</span>
                    <i class="bi bi-chevron-right"></i
                  ></a>
                  <ul>
                    <li>
                      <a href="/baganmekpkk">Bagan Mekanisme Gerakkan PKK Di Indramayu</a>
                    </li>
                    <li>
                      <a href="baganmekel">Bagan Mekanisme Gerakkan PKK Di Desa/Kelurahan</a>
                    </li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#"
                    ><span
                      >Bagan Struktur TP PKK Dan Kelompok-Kelompok PKK</span
                    >
                    <i class="bi bi-chevron-right"></i
                  ></a>
                  <ul>
                    <li>
                      <a href="/pkk"
                        >Bagan Struktur TP PKK Kabupaten
                      </a>
                    </li>
                    <li>
                      {{-- <a href="/baganmekel">Bagan Struktur PKK Kecamatan</a> --}}
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="/profil">Profile Pembina dan Ketua TP PKK</a>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#services"
                ><span>Pokja & Sekretariat</span>
                <i class="bi bi-chevron-down"></i
              ></a>
              <ul>
                <li class="dropdown">
                  <a href="#"
                    ><span>Kelompok Kerja (POKJA) I</span>
                    <i class="bi bi-chevron-right"></i
                  ></a>
                  <ul>
                    <li><a href="/pokja1">Program POKJA I</a></li>
                    <li><a href="/papan1">Papan Data POKJA I</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#"
                    ><span>Kelompok Kerja (POKJA) II</span>
                    <i class="bi bi-chevron-right"></i
                  ></a>
                  <ul>
                    <li><a href="/pokja2">Program POKJA II</a></li>
                    <li><a href="/papan2">Papan Data POKJA II</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#"
                    ><span>Kelompok Kerja (POKJA) III</span>
                    <i class="bi bi-chevron-right"></i
                  ></a>
                  <ul>
                    <li><a href="/pokja3">Program POKJA III</a></li>
                    <li><a href="papan3">Papan Data POKJA III</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#"
                    ><span>Kelompok Kerja (POKJA) IV</span>
                    <i class="bi bi-chevron-right"></i
                  ></a>
                  <ul>
                    <li><a href="/pokja4">Program POKJA IV</a></li>
                    <li><a href="/papan4">Papan Data POKJA IV</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#"
                    ><span>Sekretariat</span> <i class="bi bi-chevron-right"></i
                  ></a>
                  <ul>
                    <li><a href="/sekretariat">Program Sekretariat</a></li>
                    <li><a href="/data_umum">Data Umum Sekretariat</a></li>
                  </ul>
                </li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#"
                ><span>Informasi</span> <i class="bi bi-chevron-down"></i
              ></a>
              <ul>
                <li><a href="/allberita">Berita PKK</a></li>
                <li><a href="/agenda">Agenda Kegiatan</a></li>
                <li><a href="/allgaleri">Galeri Kegiatan</a></li>
                {{-- <li><a href="/kontak">Kontak Kami</a></li> --}}
              </ul>
            </li>
          <li>
              <a class="nav-link scrollto" href="/admin_desa/login">ADMIN PKK</a>
            </li>

          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->

    @yield('container')
    @yield('li')

<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
            <img src="{{ url('../image/remove.png') }}" width="200px" />
          </div>

          {{-- <div class="col-lg-2 col-md-6 footer-links"> --}}
            <!-- <h4>Link Terkait</h4>
            <ul>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="#">Beranda</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="#">About us</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="#">Services</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="#">Terms of service</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="#">Privacy policy</a>
              </li>
            </ul> -->
          {{-- </div> --}}

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Kontak Kami</h4>
            <p style="color: black">Jalan Wiralodra No.53, Indramayu</p>
              <p style="color: black">Telp : 0732874749</p>
              <p style="color: black">E-mail : kabupatenindramayutppkk@gmail.com</p>
              <div class="social-links text-left text-md-right pt-2 pt-md-0">
                {{-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> --}}
                <a href="https://www.facebook.com/profile.php?id=100075939237683" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://instagram.com/pkkkabupatenindramayu?utm_medium=copy_link" class="instagram"><i class="bx bxl-instagram"></i></a>
                {{-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
              </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>SEKRETARIAT TIM PENGGERAK PKK KABUPATEN INDRAMAYU</h4>
            <p>
              Tamen quem nulla quae legam multos aute sint culpa legam noster
              magna
            </p>
            <!-- <form action="" method="post">
              <input type="email" name="email" /><input
                type="submit"
                value="Subscribe"
              />
            </form> -->
          </div>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright 2022
          <strong
            ><span
              >Pemberdayaan Kesejahteraan Keluarga (PKK) Kab. Indramayu</span
            ></strong
          >. All Rights Reserved
        </div>

      </div>

    </div>
  </footer>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a
    href="#"
    class="back-to-top d-flex align-items-center justify-content-center"
    ><i class="bi bi-arrow-up-short"></i
  ></a>

  <!-- Vendor JS Files -->
  <script src="{{ url ('assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ url ('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ url ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url ('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ url ('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url ('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url ('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url ('assets/js/main.js') }}"></script>

  @stack('script-addon')
  @include('sweetalert::alert')

  @yield('script')
</body>
</html>
