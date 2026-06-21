@extends('layouts.app')

@section('title', 'Wisata: ' . $wisata->judul)

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>{{ $wisata->judul }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('wisata.index') }}">Wisata</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $wisata->judul }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="wisata-detail-section section-padding">
        <div class="container detail-grid">
            <div class="wisata-content">
                <img src="{{ $wisata->gambar_url }}" alt="{{ $wisata->judul }}" class="wisata-image">

                <h2>Tentang {{ $wisata->judul }}</h2>
                <p>{{ $wisata->deskripsi }}</p>

                @if (count($wisata->fasilitas_array))
                    <h3>Fasilitas</h3>
                    <ul class="activity-list-wisata">
                        @foreach ($wisata->fasilitas_array as $fasilitas)
                            <li><i class="fas fa-check-circle"></i> {{ $fasilitas }}</li>
                        @endforeach
                    </ul>
                @endif

                @if ($wisata->maps_embed)
                    <h3>Peta Lokasi</h3>
                    <div class="map-container">
                        <iframe src="{{ $wisata->maps_embed }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                @endif
            </div>

            <aside class="service-sidebar">
                <div class="sidebar-widget">
                    <h4>Informasi Praktis</h4>
                    <ul class="info-list">
                        <li><strong><i class="far fa-clock"></i> Jam Buka:</strong>
                            {{ $wisata->jam_buka ? \Illuminate\Support\Str::of($wisata->jam_buka)->substr(0,5) . ' - ' . \Illuminate\Support\Str::of($wisata->jam_tutup)->substr(0,5) . ' WIB' : 'Setiap hari' }}</li>
                        <li><strong><i class="fas fa-ticket-alt"></i> Tiket Masuk:</strong> {{ $wisata->harga_tiket ?: 'Gratis' }}</li>
                        @if ($wisata->lokasi)
                            <li><strong><i class="fas fa-map-marker-alt"></i> Lokasi:</strong> {{ $wisata->lokasi }}</li>
                        @endif
                    </ul>
                </div>
                @if ($lainnya->isNotEmpty())
                    <div class="sidebar-widget">
                        <h4>Destinasi Lainnya</h4>
                        <ul class="service-list">
                            @foreach ($lainnya as $item)
                                <li><a href="{{ route('wisata.show', $item->slug) }}">{{ $item->judul }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </aside>
        </div>
    </section>
@endsection
