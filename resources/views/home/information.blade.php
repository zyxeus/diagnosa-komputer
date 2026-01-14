<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Informasi - Cek My PC</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/user.css') }}">
</head>

<body class="information-page">

  @include('layouts.partials.header')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Informasi</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.blade.php">Beranda</a></li>
            <li class="current">Informasi</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Hero Section -->
    <section class="informasi-hero text-center py-5" data-aos="fade-down">
      <div class="container">
        <h1 class="fw-bold">Pentingnya Merawat Komputer</h1>
        <p class="lead">Pelajari penyebab, kebiasaan buruk, dan tips menjaga perangkat Anda tetap optimal.</p>
      </div>
    </section>

    <!-- Informasi Section -->
    <section id="information" class="information section">
      <section class="info-section py-5">
        <div class="container" data-aos="fade-left" data-aos-delay="100">
          <div class="row text-center text-md-start align-items-center justify-content-center gy-4">
            <!-- Gambar kiri -->
            <div class="col-md-4 d-flex justify-content-center">
              <div class="img-container">
                <img src="{{ asset('assets/img/computer-properties/software_error.webp') }}" alt="Hardware Issue" class="img-fluid rounded info-img img-hover">
              </div>
            </div>

            <!-- Konten tengah -->
            <div class="col-md-4 d-flex flex-column justify-content-center align-items-center text-center">
              <div class="info-content">
                <h2 class="fw-bold">Kerusakan Hardware</h2>
                <p class="text-muted text-justified">
                  Kerusakan hardware seperti harddisk rusak, kipas tidak berputar, atau RAM tidak terbaca, merupakan masalah umum yang sering terjadi pada komputer. Hal ini bisa disebabkan oleh usia perangkat, debu, suhu berlebih, atau korsleting listrik.
                </p>
              </div>
            </div>

            <!-- Gambar kanan -->
            <div class="col-md-4 d-flex justify-content-center">
              <div class="img-container">
                <img src="{{ asset('assets/img/computer-properties/human_error.webp') }}" alt="Kerusakan Perangkat Keras" class="img-fluid rounded info-img img-hover">
              </div>
            </div>
          </div>
        </div>

        <!-- Baris 2: Informasi Software & Kesalahan Penggunaan -->
        <div class="container" data-aos="fade-right" data-aos-delay="200">
          <div class="row gx-4 values-wrapper justify-content-start mt-5 pt-3 align-items-center">
            <!-- Kerusakan Software -->
            <div class="col-md-4 col-10 mb-4 d-flex flex-column justify-content-center align-items-center">
              <div class="info-content">
                <h2 class="fw-bold text-center">Kerusakan Software</h2>
                <p class="text-muted text-justify">
                  Masalah seperti sistem tidak merespons, aplikasi crash, atau tidak bisa booting sering kali disebabkan oleh kesalahan sistem operasi atau instalasi aplikasi yang gagal. Jika tidak segera ditangani, kerusakan ini dapat mengganggu kinerja perangkat secara keseluruhan dan berpotensi menyebabkan kehilangan data penting.
                </p>
              </div>
            </div>

            <!-- Gambar Tengah -->
            <div class="col-md-4 col-10 mb-4 d-flex justify-content-center align-items-center">
              <div class="img-container">
                <img src="assets/img/computer-properties/about-computer-1.webp" class="img-fluid rounded img-hover" alt="Kerusakan Software" style="max-height: 200px;">
              </div>
            </div>

            <!-- Kesalahan Penggunaan -->
            <div class="col-md-4 col-10 mb-4 d-flex flex-column justify-content-center align-items-center">
              <div class="info-content">
                <h2 class="fw-bold text-center">Kesalahan Penggunaan</h2>
                <p class="text-muted text-justify">
                  Menginstal program sembarangan, tidak menggunakan antivirus, atau mematikan komputer paksa bisa memperparah kondisi software bahkan menyebabkan kehilangan data. Kebiasaan ini juga dapat membuka celah bagi malware untuk masuk dan merusak sistem secara lebih luas.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Benefits Section -->
      <section class="benefits-section py-5" data-aos="fade-up" data-aos-delay="100">
        <div class="container text-center">
          <h2 class="information-section-title">Keuntungan Memiliki Akun CekMyPC</h2>
          <div class="benefits-scroll-container">
            <div class="row flex-nowrap gx-4 benefits-wrapper justify-content-start">
              <!-- Benefit 1 -->
              <div class="col-md-4 col-10 flex-shrink-0" data-aos="fade-left" data-aos-delay="200">
                <div class="benefit-card p-4 shadow rounded bg-white h-100">
                  <h3 class="benefit-number mb-3">01</h3>
                  <h4 class="fw-bold mb-2">Akses Diagnosa Lebih Cepat</h4>
                  <p class="mb-0">Pengguna akun dapat melakukan diagnosa berulang tanpa isi ulang data dari awal.</p>
                </div>
              </div>
              <!-- Benefit 2 -->
              <div class="col-md-4 col-10 flex-shrink-0" data-aos="fade-left" data-aos-delay="450">
                <div class="benefit-card p-4 shadow rounded bg-white h-100">
                  <h3 class="benefit-number mb-3">02</h3>
                  <h4 class="fw-bold mb-2">Riwayat Diagnosa</h4>
                  <p class="mb-0">Kamu dapat menelusuri riwayat perangkat serta masalah dan solusi yang pernah diberikan sebelumnya.</p>
                </div>
              </div>
              <!-- Benefit 3 -->
              <div class="col-md-4 col-10 flex-shrink-0" data-aos="fade-left" data-aos-delay="700">
                <div class="benefit-card p-4 shadow rounded bg-white h-100">
                  <h3 class="benefit-number mb-3">03</h3>
                  <h4 class="fw-bold mb-2">Unduh Laporan PDF</h4>
                  <p class="mb-0">Hasil diagnosa dapat diunduh dalam format PDF untuk disimpan atau dicetak.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Registration Section -->
      <section class="registration-section section" id="Registration" data-aos="fade-up" data-aos-delay="150">
        <div class="container" data-aos="fade-up" data-aos-delay="200">
          <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
              <div class="registration-content text-center">
                <h2 class="about-section-title">Bergabung dengan Cek My PC</h2>
                <p>
                  Daftarkan akun Anda sekarang untuk mulai menggunakan layanan diagnosis kerusakan komputer secara cepat, mudah, dan akurat.
                </p>
                <div class="cta-buttons">
                  <a href="{{ route('user.register.form') }}" class="btn-cta">
                      <i class="bi bi-person-plus-fill"></i> Daftar Sekarang
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </section>
  </main>

  @include('layouts.partials.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Preloader -->
  <div id="preloader">
    <div class="bouncing-dots">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>