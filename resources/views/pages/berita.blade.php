@extends('layouts.app')

@section('title', 'Berita')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Berita & Pengumuman</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Berita</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="news-list-section section-padding">
        <div class="container detail-grid">
            <div class="news-main">
                <div class="grid-container">
                    @forelse ($artikels as $artikel)
                        <div class="news-card">
                            <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" loading="lazy">
                            <div class="news-content">
                                <div class="news-meta">
                                    <span class="category-tag tag-green">{{ $artikel->kategori->nama ?? 'Umum' }}</span>
                                    <span class="news-date"><i class="far fa-calendar-alt"></i> {{ optional($artikel->published_at)->translatedFormat('d M Y') }}</span>
                                </div>
                                <h3>{{ $artikel->judul }}</h3>
                                <p>{{ Str::limit($artikel->ringkasan ?: strip_tags($artikel->deskripsi), 120) }}</p>
                                <a href="{{ route('berita.show', $artikel->slug) }}" class="read-more-link">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @empty
                        <p class="empty-state">Belum ada berita yang dipublikasikan.</p>
                    @endforelse
                </div>

                {{ $artikels->links('components.pagination') }}
            </div>

            <aside class="service-sidebar">
                <div class="sidebar-widget">
                    <h4>Pencarian</h4>
                    <form action="{{ route('berita.index') }}" method="GET" class="search-form">
                        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari berita...">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="sidebar-widget">
                    <h4>Kategori</h4>
                    <ul class="service-list">
                        <li><a href="{{ route('berita.index') }}">Semua Kategori</a></li>
                        @foreach ($kategoris as $kategori)
                            <li><a href="{{ route('berita.index', ['kategori' => $kategori->slug]) }}">{{ $kategori->nama }} ({{ $kategori->artikels_count }})</a></li>
                        @endforeach
                    </ul>
                </div>
                @if ($populer->isNotEmpty())
                    <div class="sidebar-widget">
                        <h4>Berita Populer</h4>
                        <ul class="service-list">
                            @foreach ($populer as $item)
                                <li><a href="{{ route('berita.show', $item->slug) }}">{{ $item->judul }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </aside>
        </div>
    </section>
@endsection
