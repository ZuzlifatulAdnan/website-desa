@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Galeri Kegiatan</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Galeri</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="galeri-section section-padding">
        <div class="container">
            @if ($kategoris->isNotEmpty())
                <div class="galeri-filter">
                    <a href="{{ route('galeri.index') }}" class="filter-chip {{ !$aktif ? 'active' : '' }}">Semua</a>
                    @foreach ($kategoris as $kategori)
                        <a href="{{ route('galeri.index', ['kategori' => $kategori]) }}" class="filter-chip {{ $aktif === $kategori ? 'active' : '' }}">{{ $kategori }}</a>
                    @endforeach
                </div>
            @endif

            <div class="galeri-grid">
                @forelse ($galeris as $galeri)
                    <figure class="galeri-item">
                        <img src="{{ $galeri->gambar_url }}" alt="{{ $galeri->judul }}" loading="lazy">
                        <figcaption>
                            <h4>{{ $galeri->judul }}</h4>
                            @if ($galeri->kategori)<span>{{ $galeri->kategori }}</span>@endif
                        </figcaption>
                    </figure>
                @empty
                    <p class="empty-state">Belum ada foto di galeri.</p>
                @endforelse
            </div>

            {{ $galeris->links('components.pagination') }}
        </div>
    </section>
@endsection
