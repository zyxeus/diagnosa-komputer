<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Tentang Kami - Cek My PC</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.webp" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/user.css') }}">

</head>

<body class="about-page">

  @include('layouts.partials.header')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Tentang Kami</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li class="current">Tentang Kami</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page Title -->

    <!-- About Section -->
    <section class="about-section section-with-cover" data-aos="fade-down">
      <div class="section-cover-bg" style="background-image: url('assets/img/computer-properties/home-background.webp');"></div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="hero-content text-center" data-aos="zoom-in" data-aos-delay="200">
              <h2 class="gradient-heading about-section-title">Cek My PC</h2>
              <p class="hero-description">
                <strong>CekMyPC</strong> adalah aplikasi berbasis web untuk mendiagnosis kerusakan komputer secara cepat dan akurat tanpa perlu keahlian teknis mendalam. Dengan pendekatan <strong>Certainty Factor</strong>, sistem ini menangani ketidakpastian gejala dan memberikan analisis awal sebagai acuan sebelum perbaikan lebih lanjut.
              </p>
            </div>
            <div class="image-single-layout" data-aos="fade-up" data-aos-delay="300">
              <div class="single-image-wrap text-center">
                <img src="assets/img/computer-properties/about-computer.webp" alt="Diagnosa Otomatis" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

        <!-- Beringin Komputer Section -->
    <section class="beringin-section py-5" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center g-4">
          
          <!-- Text -->
          <div class="col-lg-6 text-center">
            <div class="beringin-content">
              <h2 class="about-section-title gradient-heading">Beringin Komputer</h2>
              <h4 class="fw-bold mb-3">Pusat Service Laptop di Tangsel</h4>
              <p>
                <strong>Beringin Komputer</strong> adalah usaha jasa service dan penjualan komputer yang berdiri sejak tahun 2018 di Pamulang, didirikan oleh enam teknisi berlatar belakang teknik. Dengan pengalaman menangani berbagai kerusakan hardware dan software, Beringin Komputer melayani perbaikan, perawatan, serta upgrade perangkat komputer dan laptop secara profesional dan berkelanjutan.
              </p>

            </div>
          </div>

          <!-- Image -->
          <div class="col-lg-6 text-center">
            <div class="beringin-image-modern" data-aos="zoom-in">
              <a href="https://maps.app.goo.gl/RumoTqaER83Gnbo58"
                target="_blank"
                class="map-overlay">
                <i class="bi bi-geo-alt-fill"></i>
                <span>Lihat di Google Maps</span>
              </a>
              <img src="assets/img/computer-properties/beringin-komputer.webp" alt="Beringin Komputer">
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- How Section -->
    <section class="how-cekmypc-section py-5" data-aos="fade-up">
      <div class="container">
        <div class="row g-4 align-items-center flex-lg-row-reverse">
          <div class="col-lg-6">
            <div class="how-text">
              <h2 class="about-section-title text-center">Mengapa Cek My PC?</h2>
              <h4 class="text-center fw-bold">Karena Membantu Anda Memahami Kerusakan Komputer Anda</h4>
              <p class="text-center">
                Banyak pengguna komputer mengalami masalah teknis yang membingungkan. Sayangnya, tidak semua orang punya latar belakang teknis. CekMyPC hadir memberikan panduan cerdas dan mudah dimengerti untuk mengetahui kemungkinan kerusakan — tanpa harus langsung ke bengkel.
              </p>
            </div>
          </div>
          <div class="col-lg-6 text-center">
            <img src="assets/img/computer-properties/about-person-1.webp" class="img-fluid rounded img-hover" alt="Gambar Bantuan CekMyPC">
          </div>
        </div>
      </div>
    </section>

    <!-- Why Section -->
    <section class="why-cekmypc-section py-5" data-aos="fade-up" data-aos-delay="200">
      <div class="container">
        <div class="row g-4 align-items-center text-center">
          <div class="col-lg-6">
            <div class="why-text">
              <h2 class="about-section-title">Bagaimana Cek My PC Membantu?</h2>
              <h4 class="text-center fw-bold">Sederhana di Depan, Kompleks di Balik Layar</h4>
              <p class="text-center">
                Sistem kami menafsirkan ketidakpastian secara matematis dan menyajikan hasil diagnosis awal. Prosesnya cukup dengan memilih gejala — dan sistem akan memberi kemungkinan kerusakan serta tingkat keyakinannya. Kami menyederhanakan proses kompleks menjadi solusi yang mudah digunakan siapa pun.
              </p>
            </div>
          </div>
          <div class="col-lg-6 text-center">
            <img src="assets/img/computer-properties/about-person-2.webp" class="img-fluid rounded img-hover" alt="Gambar Mengapa Kami Ada">
          </div>
        </div>
      </div>
    </section>

    <!-- Feedback Form -->
    <section class="about-form-section">
      <div class="container" data-aos="fade-up" data-aos-delay="200">
        <div class="form-section-title-wrapper">
          <h2 class="form-section-title">Kirim Masukan Anda</h2>
          <p class="text-center">Pendapat dan pengalaman Anda sangat membantu kami meningkatkan kualitas layanan.</p>
        </div>

        {{-- Pesan sukses --}}
        @if(session('success'))
          <div class="alert alert-success feedback-alert" id="alert-message">
            {{ session('success') }}
          </div>
        @endif

        {{-- Pesan error --}}
        @if($errors->any())
          <div class="alert alert-danger feedback-alert" id="alert-message">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="row">
          <div class="form-section">
            <form action="{{ route('feedback.store') }}" method="POST">
              @csrf
              <div class="input-group">
                <i data-feather="user"></i>
                <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}">
              </div>
              <div class="input-group">
                <i data-feather="mail"></i>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
              </div>
              <div class="input-group">
                <i data-feather="message-circle"></i>
                <textarea name="pesan" placeholder="Pesan">{{ old('pesan') }}</textarea>
              </div>
              <button type="submit" class="btn">Kirim Pesan</button>
            </form>
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
      <span></span><span></span><span></span>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <script src="https://unpkg.com/feather-icons"></script>
  <script>feather.replace()</script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="{{ asset('assets/js/user.auth.js') }}" defer></script>

  <script>
    setTimeout(function() {
      let alertBox = document.getElementById('alert-message');
      if (alertBox) {
        alertBox.style.transition = "opacity 0.5s ease";
        alertBox.style.opacity = "0";
        setTimeout(() => alertBox.remove(), 500);
      }
    }, 3000);
  </script>

</body>
</html>
