@extends('layouts.app')

@section('title', 'Budaya: ' . $budaya->judul)

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>{{ $budaya->judul }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('budaya.index') }}">Budaya</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $budaya->judul }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="budaya-detail-section section-padding">
        <div class="container detail-grid">
            <div class="budaya-content">
                <img src="{{ $budaya->gambar_url }}" alt="{{ $budaya->judul }}" class="budaya-image">

                <h2>Makna dan Tujuan Tradisi {{ $budaya->judul }}</h2>
                <p>{{ $budaya->deskripsi }}</p>

                @if (count($budaya->aktivitas_array))
                    <h3>Rangkaian Acara Utama</h3>
                    <ol class="procedure-list">
                        @foreach ($budaya->aktivitas_array as $aktivitas)
                            <li>{{ $aktivitas }}</li>
                        @endforeach
                    </ol>
                @endif
            </div>

            <aside class="service-sidebar">
                <div class="sidebar-widget">
                    <h4>Informasi Acara</h4>
                    <ul class="info-list">
                        <li><strong><i class="far fa-calendar-alt"></i> Waktu:</strong> {{ $budaya->jadwal ?: 'Rutin' }}</li>
                        <li><strong><i class="fas fa-users"></i> Peserta:</strong> Terbuka untuk seluruh warga & umum</li>
                    </ul>
                </div>
                @if ($lainnya->isNotEmpty())
                    <div class="sidebar-widget">
                        <h4>Tradisi Lainnya</h4>
                        <ul class="service-list">
                            @foreach ($lainnya as $item)
                                <li><a href="{{ route('budaya.show', $item->slug) }}">{{ $item->judul }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </aside>
        </div>
    </section>
@endsection
