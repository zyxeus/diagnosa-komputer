<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Hasil Diagnosa - Cek My PC</title>

  <!-- Google Fonts: Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <link rel="icon" href="{{ asset('assets/img/favicon.webp') }}">
  <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.webp') }}">

  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    .result-card { border-radius: 20px; padding: 40px; border: none; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); animation: fadeInUp 0.8s ease-out; }

    /* --- Style untuk 3 Lingkaran --- */
    .circles-container {
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-wrap: wrap; /* Agar responsif di layar kecil */
      gap: 20px;
      margin-bottom: 30px;
    }

    .top-result-circle {
      width: 180px;
      height: 180px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      color: #fff;
      text-align: center;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .top-result-circle:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .circle-content {
      padding: 10px;
    }

    .percentage-value {
      display: block;
      font-size: 2.5rem;
      font-weight: 700;
      line-height: 1;
    }

    .damage-name {
      display: block;
      font-size: 0.9rem;
      font-weight: 500;
      margin-top: 8px;
    }

    /* --- Style Bagian Lainnya --- */
    .main-result-box { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 15px; padding: 25px 30px; margin-bottom: 25px; }
    .main-result-box h5, .main-result-box .badge { color: #764ba2; background-color: #fff; }
    .main-result-box p { color: rgba(255, 255, 255, 0.85); }
    .main-result-box .progress { background-color: rgba(255, 255, 255, 0.3); height: 15px; }
    .main-result-box .progress-bar { background-color: #ffffff; animation: progressAnimation 1.5s ease-in-out; }
    .solusi-card { border-left: 5px solid #28a745; border-radius: 10px; padding: 20px; margin-bottom: 15px; transition: transform 0.3s ease, box-shadow 0.3s ease; background-color: #ffffff; }
    .solusi-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); }
    .solusi-card i { color: #28a745; font-size: 1.5rem; margin-right: 15px; }
    .section-title { font-weight: 600; margin-bottom: 20px; display: flex; align-items: center; }
    .section-title i { font-size: 1.8rem; margin-right: 12px; }
    .btn-diagnose-again { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; border-radius: 50px; padding: 12px 30px; font-weight: 600; color: white; transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .btn-diagnose-again:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4); color: white; }
  </style>
</head>

<body>

@include('layouts.partials.header')

<main class="main">

  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Hasil Diagnosa</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('home') }}">Beranda</a></li>
          <li><a href="{{ route('diagnosis.index') }}">Diagnosa</a></li>
          <li class="current">Hasil</li>
        </ol>
      </nav>
    </div>
  </div>

  <section class="py-5">
    <div class="container">
      <div class="card result-card">
        <h3 class="text-center mb-2">{{ $result['judul'] }}</h3>
        <p class="text-muted text-center">{{ $result['deskripsi'] }}</p>

        <div class="circles-container">
            @forelse ($result['hasil'] as $item)
                <div class="top-result-circle" style="background-color: {{ $item['color'] }};">
                    <div class="circle-content">
                        <span class="percentage-value">{{ $item['nilai'] }}%</span>
                        <span class="damage-name">{{ $item['kerusakan'] }}</span>
                    </div>
                </div>
            @empty
                <p class="text-center w-100">Tidak ada data kerusakan untuk ditampilkan.</p>
            @endforelse
        </div>

        <hr>

       <h4 class="fw-bold text-primary mb-3">
    <i class="bi bi-exclamation-triangle-fill"></i> Analisis Kerusakan Utama
</h4>

    <div class="mb-3">

        <h5 class="fw-bold">{{ $result['kerusakan_tertinggi']->nama_kerusakan }}</h5>

        {{-- TAMBAHAN IMAGE --}}
        <div class="my-3">
            <img
                src="{{ asset('images/kerusakan/' . ($result['kerusakan_tertinggi']->gambar ?? 'default.png')) }}"
                class="img-fluid rounded shadow"
                style="max-height: 220px;"
                alt="Gambar Kerusakan"
                onerror="this.src='{{ asset('images/kerusakan/default.png') }}'"
            >
        </div>
        {{-- END IMAGE --}}

        <p class="text-muted">{{ $result['kerusakan_tertinggi']->deskripsi }}</p>

        <div class="progress mb-2">
            <div class="progress-bar bg-primary"
                role="progressbar"
                style="width: {{ $result['hasil'][0]['nilai'] }}%;"
                aria-valuenow="{{ $result['hasil'][0]['nilai'] }}"
                aria-valuemin="0"
                aria-valuemax="100">
            </div>
        </div>

        <span class="badge bg-primary fs-6">
            {{ $result['hasil'][0]['nilai'] }}% Keyakinan
        </span>

    </div>


        <hr>

        <h4 class="section-title text-success">
            <i class="bi bi-tools"></i> Solusi yang Disarankan
        </h4>
        @forelse($result['solusi'] as $solusi)
            <div class="solusi-card d-flex align-items-center">
                <i class="bi bi-check-circle-fill"></i>
                <div>
                    <strong>{{ $solusi->kode_solusi }}</strong><br>
                    <span class="text-muted">{{ $solusi->deskripsi_solusi }}</span>
                </div>
            </div>
        @empty
            <p class="text-danger">Belum ada solusi untuk kerusakan ini.</p>
        @endforelse

        <div class="mt-5 text-center">
          <a href="{{ route('diagnosis.index') }}" class="btn btn-diagnose-again">
            <i class="bi bi-arrow-clockwise"></i> Diagnosa Ulang
          </a>

          <a href="{{ route('diagnosis.result.pdf', $riwayat->riwayat_id) }}"
            class="btn btn-danger">
            Download PDF
          </a>


        </div>
      </div>
    </div>
  </section>
</main>

@include('layouts.partials.footer')

<!-- Bootstrap JS -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- TIDAK PERLU CHART.JS LAGI -->

</body>
</html>