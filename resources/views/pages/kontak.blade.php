@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Hubungi Kami</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="contact-page-section section-padding">
        <div class="container">
            <h2 class="section-title">Informasi & Formulir Kontak</h2>
            <p class="section-subtitle">
                Kami siap melayani Anda. Jangan ragu untuk menghubungi kami melalui detail di bawah atau kirimkan pesan
                melalui formulir kapan saja.
            </p>
            <div class="contact-grid">
                <div class="contact-info">
                    <h3>Informasi Kontak</h3>
                    <ul class="contact-details-list">
                        <li class="contact-item">
                            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="contact-text">
                                <label>Alamat</label>
                                <span>{{ $desa->alamat ?? '-' }}</span>
                            </div>
                        </li>
                        @if ($desa->telepon ?? false)
                            <li class="contact-item">
                                <div class="contact-icon"><i class="fas fa-phone"></i></div>
                                <div class="contact-text">
                                    <label>Telepon</label>
                                    <span>{{ $desa->telepon }}</span>
                                </div>
                            </li>
                        @endif
                        @if ($desa->email ?? false)
                            <li class="contact-item">
                                <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                                <div class="contact-text">
                                    <label>Email</label>
                                    <span>{{ $desa->email }}</span>
                                </div>
                            </li>
                        @endif
                        <li class="contact-item">
                            <div class="contact-icon"><i class="far fa-clock"></i></div>
                            <div class="contact-text">
                                <label>Jam Pelayanan</label>
                                <span>{{ $desa->jam_pelayanan ?? 'Senin - Jumat: 08:00 - 16:00 WIB' }}</span>
                            </div>
                        </li>
                    </ul>
                    <div class="social-follow">
                        <h4>Ikuti Kami</h4>
                        <div class="social-icons">
                            @if ($desa->facebook ?? false)<a href="{{ $desa->facebook }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>@endif
                            @if ($desa->instagram ?? false)<a href="{{ $desa->instagram }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>@endif
                            @if ($desa->youtube ?? false)<a href="{{ $desa->youtube }}" target="_blank" rel="noopener" aria-label="YouTube"><i class="fab fa-youtube"></i></a>@endif
                            @if ($desa->tiktok ?? false)<a href="{{ $desa->tiktok }}" target="_blank" rel="noopener" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>@endif
                            @if ($desa->whatsapp ?? false)<a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $desa->whatsapp) }}" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>@endif
                            @if ($desa->website ?? false)<a href="{{ $desa->website }}" target="_blank" rel="noopener" aria-label="Website"><i class="fas fa-globe"></i></a>@endif
                        </div>
                    </div>
                </div>

                <div class="form-wrapper">
                    @include('components.kontak-form')
                </div>
            </div>
        </div>
    </section>

    @if ($desa->maps_embed ?? false)
        <section class="map-section">
            <h2 class="section-title">Peta Lokasi Kantor Desa</h2>
            <div class="map-container">
                <iframe src="{{ $desa->maps_embed }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    @endif
@endsection
