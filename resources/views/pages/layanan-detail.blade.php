@extends('layouts.app')

@section('title', 'Layanan: ' . $layanan->judul)

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>{{ $layanan->judul }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('layanan.index') }}">Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $layanan->judul }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="service-detail-section section-padding">
        <div class="container detail-grid">
            <div class="service-content">
                <h2>Deskripsi Lengkap</h2>
                <p>{{ $layanan->deskripsi }}</p>

                @if (count($layanan->persyaratan_array))
                    <h3>Persyaratan</h3>
                    <ul class="requirements-list">
                        @foreach ($layanan->persyaratan_array as $syarat)
                            <li><i class="fas fa-check"></i> {{ $syarat }}</li>
                        @endforeach
                    </ul>
                @endif

                @if (count($layanan->prosedur_array))
                    <h3>Prosedur Pengajuan</h3>
                    <ol class="procedure-list">
                        @foreach ($layanan->prosedur_array as $langkah)
                            <li>{{ $langkah }}</li>
                        @endforeach
                    </ol>
                @endif

                <div class="service-meta">
                    <div class="meta-item">
                        <h4><i class="far fa-clock"></i> Waktu Pelayanan</h4>
                        <p>{{ $layanan->waktu_pelayanan ?: 'Menyesuaikan' }}</p>
                    </div>
                    <div class="meta-item">
                        <h4><i class="fas fa-money-bill-wave"></i> Biaya</h4>
                        <p>{{ $layanan->biaya ?: 'Gratis' }}</p>
                    </div>
                </div>
            </div>

            <aside class="service-sidebar">
                <div class="sidebar-widget">
                    <h4>Layanan Lainnya</h4>
                    <ul class="service-list">
                        @foreach ($lainnya as $item)
                            <li><a href="{{ route('layanan.show', $item->slug) }}">{{ $item->judul }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="sidebar-widget help-widget">
                    <h4><i class="fas fa-paper-plane"></i> Ajukan Layanan Ini</h4>
                    <p>Ajukan permohonan layanan ini secara online dan lacak statusnya dengan mudah.</p>
                    <a href="{{ route('permohonan.create', ['layanan' => $layanan->slug]) }}" class="btn btn-primary btn-full">Ajukan Permohonan</a>
                </div>
                <div class="sidebar-widget help-widget">
                    <h4><i class="fas fa-question-circle"></i> Butuh Bantuan?</h4>
                    <p>Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi petugas pelayanan kami.</p>
                    <a href="{{ route('kontak.index') }}" class="btn btn-outline btn-full">Hubungi Kami</a>
                </div>
            </aside>
        </div>
    </section>
@endsection
