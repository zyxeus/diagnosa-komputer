<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Diagnosa - Cek My PC</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/user.css') }}">
</head>

<style>
.slider-cf {
    height: 6px;
    border-radius: 5px;
    -webkit-appearance: none;
    outline: none;
    background: linear-gradient(90deg, #0d6efd 50%, #dcdcdc 50%);
}

.slider-cf::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: #0d6efd;
    cursor: pointer;
}

.slider-cf::-moz-range-thumb {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: #0d6efd;
    cursor: pointer;
}


</style>
<body class="diagnosis-page">

@include('layouts.partials.header')

<main class="main">

  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Diagnosa</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('home') }}">Beranda</a></li>
          <li class="current">Diagnosa</li>
        </ol>
      </nav>
    </div>
  </div>

  <section id="diagnosa" class="diagnosa-section py-5" data-aos="fade-down">
    <div class="container">
      <div class="card diagnosa-card">

        <h2 class="text-center mb-4 form-diagnosis-title">Form Diagnosa Kerusakan Komputer</h2>
        <p class="text-muted text-style">
          *Silakan pilih gejala kerusakan yang Anda alami, lalu sesuaikan tingkat keyakinannya menggunakan slider.
        </p>

        @auth

        {{-- FORM MULAI --}}
        <form id="diagnosaForm" method="POST" action="{{ route('diagnosis.process') }}">
          @csrf

          <div id="form-group-container">
            @for ($i = 1; $i <= 3; $i++)
            <div class="form-group mb-3 d-flex align-items-center gejala-row">

              <label class="gejala-label fw-bold">Gejala {{ $i }}</label>

              <select class="form-select me-3 gejala-select" name="gejala[]">
                <option value="">-- Pilih Gejala --</option>
                @foreach($gejalas as $gejala)
                  <option value="{{ $gejala->kode_gejala }}">{{ $gejala->nama_gejala }}</option>
                @endforeach
              </select>

              {{-- SLIDER --}}
             <input type="range" min="0" max="100" step="10" value="50"
              class="custom-range slider-cf"
              oninput="updateSlider(this)" style="width: 320px;">
              <span class="ms-2 slider-value text-primary fw-semibold">50%</span>


              {{-- HIDDEN CF USER --}}
              <input type="hidden" class="cf-hidden" name="cf[]"
                     value="0.5">

            </div>
            @endfor
          </div>

        </form>
        {{-- FORM SELESAI --}}

        <div class="text-start">
          <button class="btn btn-primary" onclick="tambahFormGroup()">
            <i class="bi bi-plus-circle me-2"></i>Tambah Gejala
          </button>
        </div>

        <div class="text-center mb-3 mt-3">
          <button type="button" class="btn btn-secondary" onclick="resetForm()">
            <i class="bi bi-arrow-clockwise me-2"></i>Reset
          </button>

          <button type="button" class="btn btn-primary" onclick="submitDiagnosa()">
            Proses Diagnosa
          </button>
        </div>

        @else

        <div class="text-center mt-4">
          <p class="text-danger">
            Untuk melakukan diagnosa, silakan login terlebih dahulu.
          </p>

          <a href="{{ route('user.login.form') }}" class="btn btn-outline-primary px-4">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
          </a>

          <a href="{{ route('user.register.form') }}" class="btn btn-primary px-4">
            <i class="bi bi-person-plus-fill me-1"></i> Daftar Sekarang
          </a>
        </div>

        @endauth

      </div>
    </div>
  </section>

  {{-- Bagian dekoratif --}}
  <section class="fact-section py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h3 class="fw-bold mb-4">Kenali Komputer Anda Lebih Dalam</h3>
          <p>"Merawat komputer bukan sekadar performa, tapi juga perlindungan data."</p>
        </div>
        <div class="col-lg-6 text-center">
          <img src="{{ asset('assets/img/computer-properties/about-computer-2.webp') }}"
               class="img-fluid fact-img" />
        </div>
      </div>
    </div>
  </section>

</main>

@include('layouts.partials.footer')

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/main.js"></script>

<script>
  // Update CF slider ke hidden input
  function updateSlider(slider) {
    const row = slider.closest('.gejala-row');
    const hidden = row.querySelector('.cf-hidden');
    const label = row.querySelector('.slider-value');

    let val = slider.value;

    // set nilai CF user (0–1)
    hidden.value = val / 100;

    // update label %
    label.innerText = val + "%";

    // warna progress: biru dari 0 - posisi slider
    slider.style.background = `
        linear-gradient(90deg, #0d6efd ${val}%, #dcdcdc ${val}%)
    `;
}


  // Submit Form
  function submitDiagnosa() {
      document.getElementById('diagnosaForm').submit();
  }

  // Tambah Form Gejala
  function tambahFormGroup() {
      let container = document.getElementById('form-group-container');

      let idx = container.children.length + 1;

      let newRow = document.createElement('div');
      newRow.classList.add('form-group', 'mb-3', 'd-flex', 'align-items-center', 'gejala-row');

      newRow.innerHTML = `
          <label class="gejala-label fw-bold">Gejala ${idx}</label>

          <select class="form-select me-3 gejala-select" name="gejala[]">
              <option value="">-- Pilih Gejala --</option>
              @foreach($gejalas as $gejala)
                <option value="{{ $gejala->kode_gejala }}">{{ $gejala->nama_gejala }}</option>
              @endforeach
          </select>

          <input type="range" min="0" max="100" step="10" value="50"
                class="custom-range slider-cf"
                oninput="updateSlider(this)" style="width: 320px;">

          <span class="ms-2 slider-value text-primary fw-semibold">50%</span>

          <input type="hidden" class="cf-hidden" name="cf[]" value="0.5">

       
      `;

      container.appendChild(newRow);
      newRow.querySelector('.slider-cf').style.background =
    "linear-gradient(90deg, #0d6efd 50%, #dcdcdc 50%)";

  }

function perbaruiLabel() {
    document.querySelectorAll('#form-group-container .gejala-row').forEach((row, index) => {
        row.querySelector('.gejala-label').innerText = `Gejala ${index + 1}`;
    });
}

  // Reset
  function resetForm() {
      location.reload();
  }
</script>

</body>
</html>
