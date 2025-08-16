@extends('layouts.app')

@section('title', 'Detail Wisata')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Detail Destinasi: Teropong Kota</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('wisata.index') }}">Wisata</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Teropong Kota</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="wisata-detail-section section-padding">
        <div class="container detail-grid">
            <div class="wisata-content">
                <img src="https://placehold.co/800x500/86efac/ffffff?text=Pemandangan+Teropong+Kota"
                    alt="Pemandangan indah dari Teropong Kota" class="wisata-image">

                <h2>Keindahan Puncak Teropong Kota</h2>
                <p>Teropong Kota adalah salah satu destinasi unggulan di Desa Sumur Kumbang yang menawarkan pemandangan
                    panorama kota Bandar Lampung dari ketinggian. Terletak di lereng Gunung Rajabasa, tempat ini memberikan
                    pengalaman menenangkan dengan udara sejuk dan pemandangan yang memukau, terutama saat matahari terbenam.
                </p>
                <p>Selain menjadi spot fotografi yang populer, area ini juga dilengkapi dengan beberapa gardu pandang dan
                    area duduk yang nyaman bagi pengunjung untuk bersantai dan menikmati suasana alam.</p>

                <h3>Galeri Foto</h3>
                <div class="gallery-grid">
                    <a href="#"><img src="https://placehold.co/400x300/a3e635/ffffff?text=Spot+Foto+1"
                            alt="Spot foto di Teropong Kota"></a>
                    <a href="#"><img src="https://placehold.co/400x300/4ade80/ffffff?text=Sunset"
                            alt="Matahari terbenam di Teropong Kota"></a>
                    <a href="#"><img src="https://placehold.co/400x300/84cc16/ffffff?text=Gardu+Pandang"
                            alt="Gardu pandang di Teropong Kota"></a>
                    <a href="#"><img src="https://placehold.co/400x300/bef264/ffffff?text=Pengunjung"
                            alt="Pengunjung menikmati suasana"></a>
                </div>

                <h3>Aktivitas yang Bisa Dilakukan</h3>
                <ul class="activity-list-wisata">
                    <li><i class="fas fa-camera"></i> Berfoto dengan latar belakang pemandangan kota.</li>
                    <li><i class="fas fa-binoculars"></i> Mengamati pemandangan dengan teropong yang disediakan.</li>
                    <li><i class="fas fa-coffee"></i> Bersantai di warung kopi lokal sambil menikmati udara sejuk.</li>
                    <li><i class="fas fa-campground"></i> Area berkemah tersedia bagi yang ingin menikmati malam.</li>
                </ul>

                <h3>Peta Lokasi</h3>
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15886.3211518047!2d105.282413!3d-5.418579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40da543c3a505f%3A0x1d33c140c2a71143!2sBandar%20Lampung%2C%20Kota%20Bandar%20Lampung%2C%20Lampung!5e0!3m2!1sid!2sid!4v1723727083162!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <aside class="service-sidebar">
                <div class="sidebar-widget">
                    <h4>Informasi Praktis</h4>
                    <ul class="info-list">
                        <li><strong><i class="far fa-clock"></i> Jam Buka:</strong> 08:00 - 18:00 WIB</li>
                        <li><strong><i class="fas fa-ticket-alt"></i> Tiket Masuk:</strong> Rp 10.000 / orang</li>
                        <li><strong><i class="fas fa-parking"></i> Parkir:</strong> Tersedia (Motor & Mobil)</li>
                        <li><strong><i class="fas fa-utensils"></i> Warung:</strong> Tersedia</li>
                        <li><strong><i class="fas fa-mosque"></i> Mushola:</strong> Tersedia</li>
                    </ul>
                </div>
                <div class="sidebar-widget">
                    <h4>Destinasi Lainnya</h4>
                    <ul class="service-list">
                        <li><a href="#">Pendakian Gunung Rajabasa</a></li>
                        <li><a href="#">Petilasan Syekh Mashur</a></li>
                        <li><a href="#">Air Terjun Way Tayas</a></li>
                        <li><a href="#">Pasar Tradisional</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>
@endsection
