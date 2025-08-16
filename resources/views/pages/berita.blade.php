@extends('layouts.app')

@section('title', 'Berita')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Semua Berita & Pengumuman</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Berita</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="news-list-section section-padding">
        <div class="container">
            <div class="grid-container">
                <div class="news-card">
                    <img src="https://placehold.co/400x300/84cc16/ffffff?text=Pembangunan+Jalan"
                        alt="Proyek pembangunan jalan desa" loading="lazy">
                    <div class="news-content">
                        <div class="news-meta"><span class="category-tag tag-green">Infrastruktur</span><span
                                class="news-date"><i class="far fa-calendar-alt"></i> 15 Des 2024</span></div>
                        <h3>Pembangunan Jalan Desa Fase 2 Dimulai</h3>
                        <p>Proyek pembangunan jalan desa fase 2 sepanjang 2 km telah dimulai dan diperkirakan selesai...</p>
                        <a href="{{ route('berita.create') }}" class="read-more-link">Baca Selengkapnya <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="news-card">
                    <img src="https://placehold.co/400x300/a3e635/ffffff?text=Pelatihan+UMKM"
                        alt="Ibu-ibu PKK mengikuti pelatihan UMKM" loading="lazy">
                    <div class="news-content">
                        <div class="news-meta"><span class="category-tag tag-blue">Ekonomi</span><span class="news-date"><i
                                    class="far fa-calendar-alt"></i> 12 Des 2024</span></div>
                        <h3>Program Pelatihan UMKM untuk Ibu-Ibu PKK</h3>
                        <p>Desa Sejahtera mengadakan pelatihan keterampilan membuat kerajinan tangan dan pengolahan...</p>
                        <a href="{{ route('berita.create') }}" class="read-more-link">Baca Selengkapnya <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="news-card">
                    <img src="https://placehold.co/400x300/bef264/ffffff?text=Vaksinasi"
                        alt="Obat-obatan dan kapsul untuk vaksinasi" loading="lazy">
                    <div class="news-content">
                        <div class="news-meta"><span class="category-tag tag-red">Kesehatan</span><span class="news-date"><i
                                    class="far fa-calendar-alt"></i> 10 Des 2024</span></div>
                        <h3>Vaksinasi COVID-19 Booster Gratis</h3>
                        <p>Puskesmas bekerjasama dengan pemerintah desa mengadakan vaksinasi booster gratis...</p>
                        <a href="{{ route('berita.create') }}" class="read-more-link">Baca Selengkapnya <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <nav class="pagination">
                <ul>
                    <li><a href="#" class="page-link disabled">Sebelumnya</a></li>
                    <li><a href="#" class="page-link active">1</a></li>
                    <li><a href="#" class="page-link">2</a></li>
                    <li><a href="#" class="page-link">3</a></li>
                    <li><a href="#" class="page-link">Berikutnya</a></li>
                </ul>
            </nav>
        </div>
    </section>
@endsection
