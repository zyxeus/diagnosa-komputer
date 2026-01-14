<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Diagnosa - Cek My PC</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,200;0,400;0,600;0,800&family=Raleway:ital,wght@0,200;0,400;0,600;0,800&display=swap" rel="stylesheet">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/user.css') }}" rel="stylesheet">
</head>

<body class="profile-page">

  @include('layouts.partials.header')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Profile Saya</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li class="current">Profile Saya</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page Title -->

    <div class="container custom-alert-wrapper">
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      @if(session('success_password'))
        <div class="alert alert-success">
          {{ session('success_password') }}
        </div>
      @endif
    </div>

    <section class="profile-edit-section py-5">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        {{-- Form Update Profile --}}
        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Foto Profil -->
        <div class="upload-container">
          <label for="foto_profil" style="cursor:pointer; margin: 0;">
            <div class="frame">
              <img
                id="preview-foto"
                src="{{ $user->foto_profil ? asset($user->foto_profil) : asset('assets/img/default-user.png') }}"
                alt="Unggah Foto"
                class="foto-preview" 
              >
            </div>
          </label>
          <input type="file" id="foto_profil" name="foto_profil" style="display: none;" accept="image/*">
        </div>

        <!-- Nama -->
        <div class="form-group">
            <label>Nama</label>
            <input type="text"
                  name="name"
                  value="{{ old('name', $user->name) }}"
                  class="form-control @error('name') is-invalid @enderror"
                  pattern="[A-Za-z ]+"
                  title="Nama hanya boleh berisi huruf"
                  required>

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label">Alamat Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
        </div>

        <div class="mb-3">
          <label for="pekerjaan" class="form-label">Pekerjaan</label>
          <select class="form-select" id="pekerjaan" name="pekerjaan">
            <option value="">-- Pilih Pekerjaan --</option>
            <option value="Mahasiswa" {{ auth()->user()->pekerjaan == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
            <option value="Dosen" {{ auth()->user()->pekerjaan == 'Dosen' ? 'selected' : '' }}>Dosen</option>
            <option value="Pegawai Swasta" {{ auth()->user()->pekerjaan == 'Pegawai Swasta' ? 'selected' : '' }}>Pegawai Swasta</option>
            <option value="Teknisi Komputer" {{ auth()->user()->pekerjaan == 'Teknisi Komputer' ? 'selected' : '' }}>Teknisi Komputer</option>
            <option value="Freelancer" {{ auth()->user()->pekerjaan == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
            <option value="Pegawai BUMN" {{ auth()->user()->pekerjaan == 'Pegawai BUMN' ? 'selected' : '' }}>Pegawai BUMN</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </form>

        {{-- Form Ubah Password --}}
        <h4 class="mb-3">Ubah Password</h4>
        <form action="{{ route('user.profile.password') }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="current_password" class="form-label">Password Lama</label>
            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="new_password" class="form-label">Password Baru</label>
            <input type="password"
              class="form-control @error('new_password') is-invalid @enderror"
              id="new_password"
              name="new_password"
              required
              minlength="6"
              maxlength="8"
              pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9]+$"
              title="Password harus 6–8 karakter, mengandung huruf dan angka, tanpa spasi dan simbol">
            @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
            <input type="password"
              class="form-control"
              id="new_password_confirmation"
              name="new_password_confirmation"
              required
              minlength="6"
              maxlength="8">
          </div>

          <button type="submit" class="btn btn-warning">Ubah Password</button>
        </form>

        {{-- Riwayat --}}
        <div class="mt-5">
          <h4 class="mb-3">Riwayat Diagnosa</h4>
          
          @if($riwayats->isEmpty())
            <p class="text-muted">Belum ada riwayat diagnosa.</p>
          @else
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="table-light">
                  <tr>
                    <th>No</th>
                    <th>Hasil Diagnosa</th>
                    <th>Solusi</th>
                    <th>Jumlah Solusi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($riwayats as $index => $riwayat)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $riwayat->hasil_diagnosa }}</td>
                    <td>{!! nl2br(e($riwayat->solusi_diagnosa)) !!}</td>
                    <td>{{ $riwayat->jumlah_solusi }}</td>
                    <td>{{ \Carbon\Carbon::parse($riwayat->tanggal_diagnosa)->format('d M Y, H:i') }}</td>
                    <td>
                      <a href="{{ route('user.riwayat.download', $riwayat->riwayat_id) }}" class="btn btn-sm btn-outline-primary">Unduh</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif
        </div>

        <hr class="my-4">
        <h4 class="mb-3">Testimoni Saya</h4>

        {{-- Form tambah/edit testimoni --}}
        @if (!$testimonis->count() || $editTestimoni)
          <div class="card mb-4">
            <div class="card-body">
              <form action="{{ $editTestimoni ? route('user.testimoni.update', $editTestimoni->testimoni_id) : route('user.testimoni.store') }}" method="POST">
                @csrf
                @if($editTestimoni)
                  @method('PUT')
                @endif

                <div class="form-group">
                  <label for="isi_testimoni">{{ $editTestimoni ? 'Edit Testimoni' : 'Tulis Testimoni' }}</label>
                  <textarea name="isi_testimoni" id="isi_testimoni" class="form-control" rows="3" maxlength="200" required>{{ old('isi_testimoni', $editTestimoni->isi_testimoni ?? '') }}</textarea>
                </div>

                <div class="mt-2 d-flex align-items-center">
                  <button type="submit" class="btn btn-primary me-2">
                    {{ $editTestimoni ? 'Update' : 'Kirim' }}
                  </button>

                  @if($editTestimoni)
                    <a href="{{ route('user.profile') }}" class="btn btn-secondary">Batal</a>
                  @endif
                </div>
              </form>
            </div>
          </div>
        @endif

        {{-- Daftar testimoni user (hanya tampil jika tidak sedang edit) --}}
        @if(!$editTestimoni && $testimonis->count())
          <div class="profile-page testimonials">
            <div class="container">
              <div class="row gy-4">
                @foreach ($testimonis as $testimoni)
                  <div class="col-12 px-3" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="testimonial-item h-100">
                      <div class="testimonial-card h-100 w-100">

                        <!-- Header -->
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

                        <!-- Body -->
                        <div class="testimonial-body">
                          <i class="bi bi-chat-quote-fill quote-icon"></i>
                          <p>“{{ $testimoni->isi_testimoni }}”</p>
                        </div>

                        <!-- Tombol aksi -->
                        <div class="testimonial-actions d-flex align-items-center gap-2">
                          <a href="{{ route('user.profile', ['edit' => $testimoni->testimoni_id]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                          <form action="{{ route('user.testimoni.destroy', $testimoni->testimoni_id) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?')" class="m-0 p-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        @endif

      </div>
    </section>

  </main>

  @include('layouts.partials.footer')

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <div id="preloader">
    <div class="bouncing-dots">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/user.auth.js') }}" defer></script>

  <script>
    document.getElementById('foto_profil').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('preview-foto').src = e.target.result;
        }
        reader.readAsDataURL(file);
      }
    });
  </script>

  <script>
    setTimeout(function () {
      ['alert-success', 'alert-message'].forEach(function (id) {
        const alert = document.getElementById(id);
        if (alert) {
          alert.classList.add('fade-out');
          setTimeout(() => alert.remove(), 500); 
        }
      });
    }, 1000); 
  </script>

</body>

</html>
