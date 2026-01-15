<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Beranda - Cek My PC</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.webp" rel="icon">
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

<body class="index-page">
  
  @include('layouts.partials.header')

  <main class="main">

    <!-- ============================ Hero Section ============================ -->
    <section id="hero" class="hero section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="hero-wrapper">
          <div class="row g-4 align-items-center">

            <!-- Hero Content -->
            <div class="col-lg-7">
              <div class="hero-content" data-aos="zoom-in" data-aos-delay="200">
                <div class="content-header">
                  <span class="hero-label">
                    <i class="bi bi-pc-display-horizontal"></i>
                    Komputer Sehat, Produktivitas Meningkat
                  </span>
                  <h1 class="home-section-title">
                    Temukan Solusi Kerusakan Komputer Anda dengan Cepat dan Akurat
                  </h1>
                  <p style="text-align: justify;">
                    <strong>Cek My PC</strong> membantu pengguna mengenali kerusakan komputer tanpa keahlian teknis. Cukup pilih gejala yang dialami, sistem akan memproses dan menyajikan hasil diagnosis secara instan, termasuk untuk gangguan yang sulit dikenali secara manual.
                  </p>
                  <p style="text-align: justify;">
                    Dengan metode <strong>Certainty Factor</strong>, sistem menganalisis ketidakpastian data gejala dan mengukur tingkat kepastian terhadap kemungkinan kerusakan.
                  </p>
                </div>
              </div>
            </div>

            <!-- Hero Visual -->
            <div class="col-lg-5">
              <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
                <div class="visual-container">
                  <div class="featured-diagnosis">
                    <img src="assets/img/computer-properties/home-fix-computer.webp" alt="Perbaikan Komputer" class="img-fluid">
                    <div class="diagnosis-info">
                      <div class="diagnosis-title">Diagnosa Komputer Online</div>
                    </div>
                  </div>
                  <div class="overlay-images">
                    <div class="overlay-img overlay">
                      <img src="assets/img/computer-properties/home-fix-computer-1.webp" alt="Interior View" class="img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- ============================ Home About Section ============================ -->
    <section id="home-about" class="home-about section py-0">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 align-items-center">

          <!-- About Images -->
          <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="200">
            <div class="image-gallery">
              <div class="primary-image">
                <img src="assets/img/computer-properties/home-person-1.webp" alt="Diagnosa Komputer" class="img-fluid">
              </div>
              <div class="secondary-image">
                <img src="assets/img/computer-properties/home-person-2.webp" alt="Teknisi Komputer" class="img-fluid">
              </div>
            </div>
          </div>

          <!-- About Content -->
          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
            <div class="content">
              <div class="section-header">
                <h2 class="home-section-title">Solusi Kerusakan Komputer Sejak 2018 dan menjadi Mitra Teknis CekMyPC</h2>
              </div>
              <p style="text-align: justify;">
                <strong>Beringin Komputer</strong> adalah usaha jasa servis dan perawatan komputer yang menjadi mitra teknis dalam pengembangan sistem CekMyPC. Data gejala, jenis kerusakan, serta bobot Certainty Factor dalam sistem ini disusun berdasarkan pengalaman nyata teknisi Beringin Komputer dalam menangani berbagai permasalahan komputer. Melalui kolaborasi ini, CekMyPC tidak hanya memberikan hasil diagnosa secara teoritis, tetapi juga berdasarkan praktik nyata di lapangan sehingga lebih akurat dan dapat dipercaya.
              </p>

              <div class="row mt-4">
                <div class="col-md-4 text-center">
                  <div class="icon-box">
                    <i class="bi bi-cpu" style="font-size: 2rem; color: var(--accent-color);"></i>
                    <h5 class="mt-2">Akurasi Pakar</h5>
                    <p style="font-size: 0.9rem;">Berbasis pengalaman teknisi.</p>
                  </div>
                </div>
                <div class="col-md-4 text-center">
                  <div class="icon-box">
                    <i class="bi bi-shield-check" style="font-size: 2rem; color: var(--accent-color);"></i>
                    <h5 class="mt-2">Data Tervalidasi</h5>
                    <p style="font-size: 0.9rem;">Sudah diuji di lapangan.</p>
                  </div>
                </div>
                <div class="col-md-4 text-center">
                  <div class="icon-box">
                    <i class="bi bi-tools" style="font-size: 2rem; color: var(--accent-color);"></i>
                    <h5 class="mt-2">Solusi Nyata</h5>
                    <p style="font-size: 0.9rem;">Rekomendasi siap diterapkan.</p>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ============================ Testimonials Section ============================ -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="home-section-title">Testimoni</h2>
        <p class="testimonial-intro">
          Pengalaman pengguna nyata yang telah terbantu dengan layanan diagnosis kami. Cepat, akurat, dan dapat diandalkan dalam mengidentifikasi kerusakan komputer mereka.
        </p>
      </div>

      <!-- Testimonials Grid -->
      <div class="container">
        <div class="testimonial-grid">

          @forelse ($testimonis as $testimoni)
            <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="{{ 100 + ($loop->index * 100) }}">
              <div class="testimonial-card">

                <div class="testimonial-header">
                  <div class="testimonial-image">
                    <img
                      src="{{ $testimoni->user->foto_profil ? asset($testimoni->user->foto_profil) : asset('assets/img/default-user.png') }}"
                      alt="{{ $testimoni->user->name ?? 'Anonim' }}"
                      class="img-fluid"
                    >
                  </div>
                  <div class="testimonial-meta">
                    <h3>{{ $testimoni->user->name ?? 'Anonim' }}</h3>
                    <h4>{{ $testimoni->user->pekerjaan ?? '-' }}</h4>
                    <div class="company-logo">
                      @php
                        $ikonPekerjaan = [
                          'Mahasiswa' => 'bi bi-person-workspace',
                          'Dosen' => 'bi bi-journal-text',
                          'Pegawai Swasta' => 'bi bi-briefcase',
                          'Teknisi Komputer' => 'bi bi-tools',
                          'Freelancer' => 'bi bi-laptop',
                          'Pegawai BUMN' => 'bi bi-building',
                        ];
                        $pekerjaanUser = $testimoni->user->pekerjaan ?? '-';
                        $ikon = $ikonPekerjaan[$pekerjaanUser] ?? 'bi bi-person';
                      @endphp
                      <i class="{{ $ikon }}"></i>
                    </div>
                  </div>
                </div>

                <div class="testimonial-body">
                  <i class="bi bi-chat-quote-fill quote-icon"></i>
                  <p>“{{ $testimoni->isi_testimoni }}”</p>
                </div>

              </div>
            </div>
          @empty
            <p class="text-center">Belum ada testimoni yang tersedia.</p>
          @endforelse

        </div>
      </div>
    </section>

    <!-- ============================ Diagnosa Entry Section ============================ -->
    <section class="diagnosa-entry-section section" id="diagnosa-entry">
      <div class="diagnosa-bg" style="background-image: url('assets/img/computer-properties/home-background.webp');"></div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center text-center">
          <div class="col-lg-8">
            <div class="diagnosa-content section-title">
              <h2 class="home-section-title">Butuh Bantuan Mendiagnosis Masalah Komputer Anda?</h2>
              <p>
                <strong>Cek My PC</strong> siap membantu Anda menemukan solusi kerusakan komputer yang sulit terdeteksi dengan sistem diagnosis otomatis berbasis metode ilmiah yang dapat diakses kapan saja & di mana saja.
              </p>
              <div class="action-buttons">
                <a href="{{ url('/diagnosis') }}" class="btn btn-primary">
                  <i class="bi bi-search me-2"></i> Mulai Diagnosa
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
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
