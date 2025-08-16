@extends('layouts.app')

@section('title', 'Budaya')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Budaya & Tradisi Desa</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Budaya</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="budaya-list-section section-padding">
        <div class="container">
            <div class="grid-container">
                <div class="news-card">
                    <img src="https://placehold.co/400x300/16a34a/ffffff?text=Ruwat+Bumi" alt="Tradisi Ruwat Bumi"
                        loading="lazy" />
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="category-tag tag-green">Upacara Adat</span>
                            <span class="news-date"><i class="far fa-calendar-alt"></i> Tahunan</span>
                        </div>
                        <h3>Ruwat Bumi</h3>
                        <p>
                            Upacara adat sebagai wujud syukur atas hasil panen dan
                            kesuburan tanah desa.
                        </p>
                        <a href="{{ route('budaya.create') }}" class="read-more-link">Pelajari Lebih Lanjut <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="news-card">
                    <img src="https://placehold.co/400x300/0ea5e9/ffffff?text=Sedekah+Laut" alt="Tradisi Sedekah Laut"
                        loading="lazy" />
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="category-tag tag-blue">Tradisi Nelayan</span>
                            <span class="news-date"><i class="far fa-calendar-alt"></i> Tahunan</span>
                        </div>
                        <h3>Sedekah Laut</h3>
                        <p>
                            Ritual para nelayan sebagai ucapan syukur atas hasil laut dan
                            permohonan keselamatan.
                        </p>
                        <a href="{{ route('budaya.create') }}" class="read-more-link">Pelajari Lebih Lanjut <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="news-card">
                    <img src="https://placehold.co/400x300/f97316/ffffff?text=Pesta+Panen" alt="Tradisi Pesta Panen"
                        loading="lazy" />
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="category-tag tag-orange">Perayaan</span>
                            <span class="news-date"><i class="far fa-calendar-alt"></i> Musiman</span>
                        </div>
                        <h3>Pesta Panen Raya</h3>
                        <p>
                            Perayaan meriah yang diisi dengan berbagai pertunjukan seni
                            dan kuliner khas desa.
                        </p>
                        <a href="{{ route('budaya.create') }}" class="read-more-link">Pelajari Lebih Lanjut <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="cta-bantuan">
                <h3>Punya Informasi Mengenai Tradisi Lain?</h3>
                <p>
                    Kami sangat menghargai partisipasi warga dalam melestarikan dan
                    mendokumentasikan budaya kita. Bagikan cerita Anda!
                </p>
                <a href="index.html#kontak" class="btn btn-primary">Hubungi Kami</a>
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
