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
                @forelse ($wisatas as $wisata)
                    <div class="destination-card">
                        <div class="card-image-wrapper">
                            <img src="{{ $wisata->gambar_url }}" alt="{{ $wisata->judul }}" loading="lazy">
                            @if ($wisata->is_featured)
                                <span class="badge badge-easy">Unggulan</span>
                            @endif
                        </div>
                        <div class="card-content">
                            <div class="card-title-group">
                                <div class="card-icon icon-green"><i class="fas fa-map-marker-alt"></i></div>
                                <h3>{{ $wisata->judul }}</h3>
                            </div>
                            <p>{{ Str::limit($wisata->deskripsi, 130) }}</p>
                            <div class="card-info-bar">
                                <span><i class="fas fa-ticket-alt"></i> {{ $wisata->harga_tiket ?: 'Gratis' }}</span>
                                <span><i class="fas fa-map-marker-alt"></i> {{ Str::limit($wisata->lokasi, 24) ?: ($desa->nama_desa ?? 'Desa') }}</span>
                            </div>
                            <a href="{{ route('wisata.show', $wisata->slug) }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @empty
                    <p class="empty-state">Belum ada destinasi wisata.</p>
                @endforelse
            </div>

            <div class="cta-bantuan">
                <h3>Butuh Bantuan Merencanakan Perjalanan?</h3>
                <p>Tim kami siap membantu Anda merancang paket wisata yang tak terlupakan di {{ $desa->nama_desa ?? 'desa kami' }} dan sekitarnya.</p>
                <a href="{{ route('kontak.index') }}" class="btn btn-primary">Hubungi Kami</a>
            </div>
        </div>
    </section>
@endsection
