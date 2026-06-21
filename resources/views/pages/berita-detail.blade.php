@extends('layouts.app')

@section('title', $artikel->judul)
@section('meta_description', Str::limit($artikel->ringkasan ?: strip_tags($artikel->deskripsi), 160))

@section('content')
    <section class="article-section section-padding">
        <div class="container detail-grid">
            <article class="article-content">
                <header class="article-header">
                    <div class="article-meta">
                        <a href="{{ route('berita.index', ['kategori' => $artikel->kategori->slug ?? '']) }}" class="category-tag tag-green">{{ $artikel->kategori->nama ?? 'Umum' }}</a>
                        <span><i class="far fa-calendar-alt"></i> {{ optional($artikel->published_at)->translatedFormat('d F Y') }}</span>
                        <span><i class="far fa-user"></i> {{ $artikel->user->name ?? 'Admin Desa' }}</span>
                        <span><i class="far fa-eye"></i> {{ number_format($artikel->views) }}x dilihat</span>
                    </div>
                    <h1 class="article-title">{{ $artikel->judul }}</h1>
                </header>

                <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="article-image">

                <div class="article-body rich-text">
                    {!! $artikel->deskripsi !!}
                </div>

                <div class="share-buttons">
                    <strong>Bagikan Artikel:</strong>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" rel="noopener" class="share-btn facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($artikel->judul) }}" target="_blank" rel="noopener" class="share-btn twitter"><i class="fab fa-twitter"></i> Twitter</a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($artikel->judul . ' ' . request()->fullUrl()) }}" target="_blank" rel="noopener" class="share-btn whatsapp"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                </div>
            </article>

            <aside class="service-sidebar">
                @if ($terkait->isNotEmpty())
                    <div class="sidebar-widget">
                        <h4>Berita Terkait</h4>
                        <ul class="service-list">
                            @foreach ($terkait as $item)
                                <li><a href="{{ route('berita.show', $item->slug) }}">{{ $item->judul }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="sidebar-widget help-widget">
                    <h4><i class="fas fa-newspaper"></i> Lihat Berita Lain</h4>
                    <p>Temukan informasi terbaru lainnya seputar kegiatan dan program desa.</p>
                    <a href="{{ route('berita.index') }}" class="btn btn-primary">Semua Berita</a>
                </div>
            </aside>
        </div>
    </section>
@endsection
