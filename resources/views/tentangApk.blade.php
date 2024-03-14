@extends('templates.layout')

@push('style')
@endpush

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Informasi Website</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tentang </h5>

                <p class="card-text">"Selamat datang di Coffee Cashier! Aplikasi website kasir kopi buatan kami memberikan
                    kemudahan dalam mengelola transaksi, mengontrol stok, dan melihat laporan kinerja bisnis. Nikmati
                    pembayaran cepat. Bersama Coffee Cashier, tingkatkan layanan pelanggan dan optimalkan operasional bisnis
                    kopi Anda!"</p>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tujuan</h5>

                <p class="card-text">Tujuan utama dari Coffee Cashier adalah memberikan pengalaman yang menyenangkan dan
                    efisien dalam manajemen transaksi untuk bisnis kopi Anda. Dengan platform yang intuitif dan ramah
                    pengguna, Coffee Cashier bertujuan untuk menyederhanakan proses pembayaran, melacak inventaris dengan
                    mudah, dan memberikan laporan yang komprehensif. Kami berkomitmen untuk membantu pemilik kafe dan toko
                    kopi dalam meningkatkan produktivitas mereka, mengoptimalkan layanan pelanggan, dan mencapai kesuksesan
                    bisnis yang berkelanjutan dalam industri yang penuh semangat ini.</p>

            </div>
        </div>
    </main>
@endsection
<style>
    h1 {
        text-align: center;
    }

    .pagetittle {
        display: flex;

    }

    .card {

        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        transition: transform 0.2s ease-in-out;

        /* Posisi kursor pointer saat dihover */
        cursor: pointer;
    }

    .card:hover {
        transform: scale(1.02);
    }

    .card-title:hover {
        color: blueviolet;
    }
</style>
