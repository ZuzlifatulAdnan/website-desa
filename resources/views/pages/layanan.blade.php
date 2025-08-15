@extends('layouts.app')

@section('title', 'Semua Layanan')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Semua Layanan Desa</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Layanan</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="services section-padding">
        <div class="container">
            <div class="grid-container">
                {{-- Contoh kartu yang diubah --}}
                <div class="card">
                    <div class="card-icon icon-blue"><i class="fas fa-file-alt"></i></div>
                    <h3>Surat Keterangan</h3>
                    <p>Pembuatan berbagai surat keterangan seperti KTP, KK, surat pindah, dan lainnya.</p>
                    <a href="{{ route('layanan.detail') }}" class="card-link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                </div>
                {{-- ... Ulangi untuk semua kartu layanan ... --}}
            </div>
            @include('partials.pagination')
        </div>
    </section>
@endsection