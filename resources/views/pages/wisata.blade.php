@extends('layouts.app')

@section('title', 'Wisata')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Semua Destinasi Wisata</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wisata</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="destinations section-padding">
        <div class="container">
            <div class="grid-container">
                <div class="destination-card">
                    <div class="card-image-wrapper">
                        <img src="https://placehold.co/400x300/a3e635/ffffff?text=Teropong+Kota"
                            alt="Pemandangan kota dari ketinggian" loading="lazy">
                        <span class="badge badge-easy">Mudah</span>
                    </div>
                    <div class="card-content">
                        <div class="card-title-group">
                            <div class="card-icon icon-blue"><i class="fas fa-camera"></i></div>
                            <h3>Teropong Kota</h3>
                        </div>
                        <p>Spot terbaik untuk melihat pemandangan kota Bandar Lampung dari ketinggian. Nikmati sunset yang
                            memukau dan udara sejuk pegunungan.</p>
                        <div class="card-info-bar">
                            <span><i class="far fa-clock"></i> 2-3 jam</span>
                            <span><i class="fas fa-map-marker-alt"></i> Sumur Kumbang</span>
                        </div>
                        <a href="{{ route('wisata.create') }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="destination-card">
                    <div class="card-image-wrapper">
                        <img src="https://placehold.co/400x300/86efac/ffffff?text=Gunung+Rajabasa"
                            alt="Jalur pendakian di Gunung Rajabasa" loading="lazy">
                        <span class="badge badge-hard">Sulit</span>
                    </div>
                    <div class="card-content">
                        <div class="card-title-group">
                            <div class="card-icon icon-green"><i class="fas fa-mountain"></i></div>
                            <h3>Pendakian Gunung Rajabasa</h3>
                        </div>
                        <p>Gunung berapi aktif dengan ketinggian 1.281 mdpl. Jalur pendakian yang menantang dengan
                            pemandangan spektakuler di puncak.</p>
                        <div class="card-info-bar">
                            <span><i class="far fa-clock"></i> 6-8 jam</span>
                            <span><i class="fas fa-map-marker-alt"></i> Sumur Kumbang</span>
                        </div>
                        <a href="{{ route('wisata.create') }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="destination-card">
                    <div class="card-image-wrapper">
                        <img src="https://placehold.co/400x300/4ade80/ffffff?text=Petilasan"
                            alt="Area Petilasan Syekh Mashur" loading="lazy">
                        <span class="badge badge-easy">Mudah</span>
                    </div>
                    <div class="card-content">
                        <div class="card-title-group">
                            <div class="card-icon icon-purple"><i class="fas fa-place-of-worship"></i></div>
                            <h3>Petilasan Syekh Mashur</h3>
                        </div>
                        <p>Wisata religi bersejarah yang menjadi tempat ziarah. Situs makam utama terkenal dengan arsitektur
                            tradisional yang menarik.</p>
                        <div class="card-info-bar">
                            <span><i class="far fa-clock"></i> 1-2 jam</span>
                            <span><i class="fas fa-map-marker-alt"></i> Sumur Kumbang</span>
                        </div>
                        <a href="{{ route('wisata.create') }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="destination-card">
                    <div class="card-image-wrapper">
                        <img src="https://placehold.co/400x300/22d3ee/ffffff?text=Air+Terjun" alt="Air Terjun Way Tayas"
                            loading="lazy">
                        <span class="badge badge-easy">Mudah</span>
                    </div>
                    <div class="card-content">
                        <div class="card-title-group">
                            <div class="card-icon icon-blue"><i class="fas fa-water"></i></div>
                            <h3>Air Terjun Way Tayas</h3>
                        </div>
                        <p>Nikmati kesegaran air terjun tersembunyi dengan kolam alami yang jernih, cocok untuk berenang dan
                            bersantai bersama keluarga.</p>
                        <div class="card-info-bar">
                            <span><i class="far fa-clock"></i> 2-4 jam</span>
                            <span><i class="fas fa-map-marker-alt"></i> Sumur Kumbang</span>
                        </div>
                        <a href="{{ route('wisata.create') }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="destination-card">
                    <div class="card-image-wrapper">
                        <img src="https://placehold.co/400x300/facc15/ffffff?text=Pantai" alt="Pantai Kedu" loading="lazy">
                        <span class="badge badge-easy">Mudah</span>
                    </div>
                    <div class="card-content">
                        <div class="card-title-group">
                            <div class="card-icon icon-orange"><i class="fas fa-umbrella-beach"></i></div>
                            <h3>Pantai Kedu</h3>
                        </div>
                        <p>Pantai dengan pasir putih yang landai dan ombak yang tenang, menjadi tempat favorit untuk bermain
                            air dan menikmati kuliner laut.</p>
                        <div class="card-info-bar">
                            <span><i class="far fa-clock"></i> Seharian</span>
                            <span><i class="fas fa-map-marker-alt"></i> Kalianda</span>
                        </div>
                        <a href="{{ route('wisata.create') }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="destination-card">
                    <div class="card-image-wrapper">
                        <img src="https://placehold.co/400x300/f472b6/ffffff?text=Taman+Kupu-kupu"
                            alt="Taman Kupu-kupu Gita Persada" loading="lazy">
                        <span class="badge badge-easy">Mudah</span>
                    </div>
                    <div class="card-content">
                        <div class="card-title-group">
                            <div class="card-icon icon-red"><i class="fas fa-bug"></i></div>
                            <h3>Taman Kupu-kupu</h3>
                        </div>
                        <p>Wisata edukasi yang menakjubkan, tempat berbagai spesies kupu-kupu dilestarikan dalam sebuah
                            kubah jaring raksasa.</p>
                        <div class="card-info-bar">
                            <span><i class="far fa-clock"></i> 2-3 jam</span>
                            <span><i class="fas fa-map-marker-alt"></i> Kemiling</span>
                        </div>
                        <a href="{{ route('wisata.create') }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="cta-bantuan">
                <h3>Butuh Bantuan Merencanakan Perjalanan?</h3>
                <p>Tim kami siap membantu Anda merancang paket wisata yang tak terlupakan di Desa Sumur Kumbang dan
                    sekitarnya.</p>
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
