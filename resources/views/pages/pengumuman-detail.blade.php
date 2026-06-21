@extends('layouts.app')

@section('title', $pengumuman->judul)

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>{{ $pengumuman->judul }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="article-section section-padding">
        <div class="container detail-grid">
            <article class="article-content">
                <header class="article-header">
                    <div class="article-meta">
                        @php $tipe = \App\Models\Pengumuman::TIPE[$pengumuman->tipe] ?? $pengumuman->tipe; @endphp
                        <span class="category-tag {{ $pengumuman->tipe === 'penting' ? 'tag-red' : ($pengumuman->tipe === 'kegiatan' ? 'tag-orange' : 'tag-blue') }}">{{ $tipe }}</span>
                        <span><i class="far fa-calendar-alt"></i> {{ optional($pengumuman->tanggal)->translatedFormat('d F Y') }}</span>
                    </div>
                    <h1 class="article-title">{{ $pengumuman->judul }}</h1>
                </header>

                <div class="article-body rich-text">
                    {!! $pengumuman->isi !!}
                </div>

                @if ($pengumuman->lampiran_url)
                    <p><a href="{{ $pengumuman->lampiran_url }}" class="btn btn-outline" target="_blank" rel="noopener"><i class="fas fa-paperclip"></i> Unduh Lampiran</a></p>
                @endif
            </article>

            <aside class="service-sidebar">
                @if ($lainnya->isNotEmpty())
                    <div class="sidebar-widget">
                        <h4>Pengumuman Lainnya</h4>
                        <ul class="service-list">
                            @foreach ($lainnya as $item)
                                <li><a href="{{ route('pengumuman.show', $item->slug) }}">{{ $item->judul }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </aside>
        </div>
    </section>
@endsection
