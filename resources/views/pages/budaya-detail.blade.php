@extends('layouts.app')

@section('title', 'Detail Budaya')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Detail Tradisi: Ruwat Bumi</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('budaya.index') }}">Budaya</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ruwat Bumi</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="budaya-detail-section section-padding">
        <div class="container detail-grid">
            <div class="budaya-content">
                <img src="https://placehold.co/800x500/16a34a/ffffff?text=Upacara+Adat+Ruwat+Bumi"
                    alt="Upacara adat Ruwat Bumi" class="budaya-image">

                <h2>Makna dan Tujuan Tradisi Ruwat Bumi</h2>
                <p>Ruwat Bumi adalah sebuah upacara adat tradisional yang telah diwariskan secara turun-temurun oleh
                    masyarakat Desa Sumur Kumbang. Tradisi ini merupakan wujud rasa syukur yang mendalam kepada Tuhan Yang
                    Maha Esa atas segala karunia, terutama hasil panen yang melimpah dan kesuburan tanah yang diberikan.</p>
                <p>Selain sebagai ungkapan syukur, Ruwat Bumi juga bertujuan untuk memohon perlindungan dari segala
                    marabahaya, penyakit, dan bencana. Upacara ini menjadi momen penting bagi seluruh warga untuk berkumpul,
                    berdoa bersama, dan mempererat tali persaudaraan.</p>

                <h3>Sejarah Singkat</h3>
                <p>Menurut para sesepuh desa, tradisi Ruwat Bumi sudah ada sejak zaman nenek moyang dan berawal dari
                    kebiasaan masyarakat agraris yang hidupnya sangat bergantung pada alam. Upacara ini menjadi cara mereka
                    untuk menjaga keharmonisan antara manusia, alam, dan Sang Pencipta.</p>

                <h3>Rangkaian Acara Utama</h3>
                <ol class="procedure-list">
                    <li><strong>Penyembelihan Hewan Kurban:</strong> Biasanya berupa kerbau atau kambing sebagai simbol
                        persembahan dan rasa syukur.</li>
                    <li><strong>Kenduri atau Selamatan:</strong> Warga berkumpul di balai desa atau tempat yang dianggap
                        sakral untuk berdoa dan makan bersama hidangan yang telah disiapkan.</li>
                    <li><strong>Larung Sesaji:</strong> Di beberapa rangkaian acara, sesaji yang berisi hasil bumi akan
                        dilarung ke sungai atau laut sebagai simbol mengembalikan sebagian hasil ke alam.</li>
                    <li><strong>Pagelaran Seni Tradisional:</strong> Acara ditutup dengan pertunjukan wayang kulit,
                        tari-tarian, atau seni lokal lainnya yang berlangsung semalam suntuk.</li>
                </ol>
            </div>

            <aside class="service-sidebar">
                <div class="sidebar-widget">
                    <h4>Informasi Acara</h4>
                    <ul class="info-list">
                        <li><strong><i class="far fa-calendar-alt"></i> Waktu:</strong> Setiap Bulan Suro</li>
                        <li><strong><i class="fas fa-map-marker-alt"></i> Lokasi:</strong> Balai Desa & Sumber Mata Air</li>
                        <li><strong><i class="fas fa-users"></i> Peserta:</strong> Terbuka untuk seluruh warga & umum</li>
                    </ul>
                </div>
                <div class="sidebar-widget">
                    <h4>Tradisi Lainnya</h4>
                    <ul class="service-list">
                        <li><a href="#">Sedekah Laut</a></li>
                        <li><a href="#">Pesta Panen Raya</a></li>
                        <li><a href="#">Upacara Adat Pernikahan</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>
@endsection
