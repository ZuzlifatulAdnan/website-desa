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
                @forelse ($budayas as $budaya)
                    <div class="news-card">
                        <img src="{{ $budaya->gambar_url }}" alt="{{ $budaya->judul }}" loading="lazy" />
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="category-tag tag-green">Tradisi</span>
                                <span class="news-date"><i class="far fa-calendar-alt"></i> {{ $budaya->jadwal ?: 'Rutin' }}</span>
                            </div>
                            <h3>{{ $budaya->judul }}</h3>
                            <p>{{ Str::limit($budaya->deskripsi, 120) }}</p>
                            <a href="{{ route('budaya.show', $budaya->slug) }}" class="read-more-link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @empty
                    <p class="empty-state">Belum ada data budaya & tradisi.</p>
                @endforelse
            </div>

            <div class="cta-bantuan">
                <h3>Punya Informasi Mengenai Tradisi Lain?</h3>
                <p>Kami sangat menghargai partisipasi warga dalam melestarikan dan mendokumentasikan budaya kita. Bagikan cerita Anda!</p>
                <a href="{{ route('kontak.index') }}" class="btn btn-primary">Hubungi Kami</a>
            </div>
        </div>
    </section>
@endsection
