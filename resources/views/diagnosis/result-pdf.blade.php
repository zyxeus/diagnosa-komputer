<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('assets/img/favicon.webp') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.webp') }}">
    <meta charset="UTF-8">
    <title>Hasil Diagnosa - Cek My PC</title>

    <style>
    /* ================= GLOBAL ================= */
    body {
        font-family: "Segoe UI", DejaVu Sans, sans-serif;
        font-size: 12px;
        margin: 0;
        color: #2d3748;
        background: #f4f6fb;
    }

    /* ================= HEADER ================= */
    .header {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        padding: 18px 30px;
    }

    .header table {
        width: 100%;
    }

    .logo {
        font-size: 18px;
        font-weight: 700;
        letter-spacing: .5px;
        color:#667eea
    }

    /* ================= TITLE ================= */
    .title {
        text-align: center;
        padding: 25px 30px 10px;
    }

    .title h2 {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
    }

    .title p {
        margin-top: 6px;
        font-size: 11px;
        color: #718096;
    }

    /* ================= CARD ================= */
    .card {
        background: #ffffff;
        margin: 20px 30px;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,.05);
    }

    /* ================= CIRCLES ================= */
    .circle-wrapper {
        text-align: center;
        margin-bottom: 25px;
        page-break-inside: avoid;
    }

    .circle {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        display: inline-block;
        margin: 0 12px;
        border: 8px solid;
        box-sizing: border-box;
    }

    .circle-inner {
        margin-top: 30px;
    }

    .circle-value {
        font-size: 18px;
        font-weight: 700;
    }

    .circle-label {
        font-size: 10px;
        margin-top: 6px;
        color: #4a5568;
    }

    /* ================= MAIN DAMAGE ================= */
    .main-damage {
        text-align: center;
        margin-top: 10px;
        page-break-inside: avoid;
    }

    .main-damage h3 {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .damage-image img {
        width: 150px;
        margin: 15px 0;
    }

    /* ================= SOLUSI ================= */
    .solusi-title {
        font-size: 14px;
        font-weight: 700;
        color: #2f855a;
        margin-bottom: 15px;
    }

    .solusi-item {
        background: #f9fafb;
        border-left: 5px solid #38a169;
        padding: 10px 14px;
        border-radius: 8px;
        margin-bottom: 10px;
        font-size: 11px;
    }

    /* ================= FOOTER ================= */
    .footer {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        text-align: center;
        padding: 12px;
        font-size: 10px;
        margin-top: 30px;
    }

    /* ================= PRINT ================= */
    @media print {
        body {
            background: #ffffff;
            font-size: 11pt;
        }

        .header, .footer {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .card {
            box-shadow: none;
            margin: 10px;
        }

        .circle {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
    </style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <table>
        <tr>
            <td>
                <img src="{{ public_path('assets/img/logo.png') }}" style="height:40px;">
            </td>
            <td align="right" style="color:white;font-weight:bold;">
                Hasil Diagnosa
            </td>
        </tr>
    </table>
</div>

<!-- TITLE -->
<div class="title">
    <h2>{{ $result['judul'] }}</h2>
    <p>{{ $result['deskripsi'] }}</p>
</div>

<!-- CARD -->
<div class="card">

    <!-- CIRCLES -->
    <div class="circle-wrapper">
        @foreach ($result['hasil'] as $item)
        <div class="circle" style="border-color: {{ $item['color'] }}">
            <div class="circle-inner">
                <div class="circle-value">{{ $item['nilai'] }}%</div>
                <div class="circle-label">{{ $item['kerusakan'] }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- MAIN DAMAGE -->
    <div class="main-damage">
        <h3>{{ $result['kerusakan_tertinggi']->nama_kerusakan ?? '-' }}</h3>

        <div class="damage-image">
    <img
        src="{{ public_path('images/kerusakan/' . ($result['kerusakan_tertinggi']->gambar ?? 'default.png')) }}"
        alt="Kerusakan"
        style="width:150px;"
    >
</div>


        <p>{{ $result['kerusakan_tertinggi']->deskripsi ?? '-' }}</p>
    </div>

    <!-- SOLUSI -->
    <div style="margin-top:30px;">
        <div class="solusi-title">✔ Solusi yang Disarankan</div>

        @forelse ($result['solusi'] as $solusi)
            <div class="solusi-item">
                <strong>{{ $solusi->kode_solusi }}</strong><br>
                {{ $solusi->deskripsi_solusi }}
            </div>
        @empty
            <p>Tidak ada solusi tersedia.</p>
        @endforelse
    </div>

</div>

<!-- FOOTER -->
<div class="footer">
    Cek My PC © {{ date('Y') }}
</div>

</body>
</html>
