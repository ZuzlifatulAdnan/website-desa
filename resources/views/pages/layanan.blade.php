@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Semua Layanan Desa</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Layanan</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="services section-padding">
        <div class="container">
            <div class="layanan-cta-bar">
                <div>
                    <h3><i class="fas fa-paper-plane"></i> Ajukan Layanan Secara Online</h3>
                    <p>Tidak perlu antre. Ajukan permohonan layanan dari rumah dan lacak statusnya kapan saja.</p>
                </div>
                <a href="{{ route('permohonan.create') }}" class="btn btn-primary">Ajukan Permohonan</a>
            </div>

            <div class="grid-container">
                @php $iconColors = ['icon-blue','icon-green','icon-red','icon-purple','icon-orange','icon-gray']; @endphp
                @forelse ($layanans as $layanan)
                    <div class="card">
                        <div class="card-icon {{ $iconColors[$loop->index % count($iconColors)] }}">
                            <i class="fas {{ $layanan->icon ?: 'fa-file-alt' }}"></i>
                        </div>
                        <h3>{{ $layanan->judul }}</h3>
                        <p>{{ Str::limit($layanan->deskripsi, 120) }}</p>
                        <a href="{{ route('layanan.show', $layanan->slug) }}" class="card-link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                    </div>
                @empty
                    <p class="empty-state">Belum ada data layanan.</p>
                @endforelse
            </div>

            <div class="cta-bantuan">
                <h3>Tidak Menemukan Layanan yang Anda Cari?</h3>
                <p>Beberapa layanan mungkin memerlukan penanganan khusus. Silakan hubungi kami langsung untuk informasi lebih lanjut.</p>
                <a href="{{ route('kontak.index') }}" class="btn btn-primary">Hubungi Kami</a>
            </div>
        </div>
    </section>
@endsection
