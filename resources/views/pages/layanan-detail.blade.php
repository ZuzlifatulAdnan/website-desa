@extends('layouts.app')

@section('title', 'Detail Layanan')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Detail Layanan: Surat Keterangan</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route(name: 'layanan.index') }}">Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Surat Keterangan</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="service-detail-section section-padding">
        <div class="container detail-grid">
            <div class="service-content">
                <img src="https://placehold.co/800x500/a3e635/ffffff?text=Layanan+Administrasi"
                    alt="Ilustrasi layanan administrasi desa" class="service-image">

                <h2>Deskripsi Lengkap</h2>
                <p>Layanan pembuatan Surat Keterangan adalah salah satu layanan administrasi dasar yang disediakan oleh
                    kantor Desa Sumur Kumbang untuk keperluan warga. Surat ini sering kali menjadi dokumen pendukung untuk
                    berbagai urusan, baik di tingkat pemerintahan, perbankan, maupun swasta.</p>
                <p>Beberapa jenis surat keterangan yang umum dibuat antara lain Surat Keterangan Domisili, Surat Keterangan
                    Usaha (SKU), Surat Keterangan Tidak Mampu (SKTM), Surat Pengantar Nikah, dan lain-lain.</p>

                <h3>Persyaratan</h3>
                <ul class="requirements-list">
                    <li><i class="fas fa-check"></i> Fotokopi Kartu Tanda Penduduk (KTP) pemohon.</li>
                    <li><i class="fas fa-check"></i> Fotokopi Kartu Keluarga (KK).</li>
                    <li><i class="fas fa-check"></i> Surat Pengantar dari RT/RW setempat.</li>
                    <li><i class="fas fa-check"></i> Dokumen pendukung lain sesuai jenis surat yang diajukan (contoh: PBB
                        untuk surat domisili, data usaha untuk SKU).</li>
                </ul>

                <h3>Prosedur Pengajuan</h3>
                <ol class="procedure-list">
                    <li>Pemohon datang ke kantor desa dengan membawa semua dokumen persyaratan.</li>
                    <li>Menuju ke loket pelayanan dan sampaikan maksud untuk membuat surat keterangan.</li>
                    <li>Petugas akan memverifikasi kelengkapan dan keabsahan dokumen.</li>
                    <li>Jika dokumen lengkap, petugas akan memproses pembuatan surat.</li>
                    <li>Surat yang telah selesai akan ditandatangani oleh Kepala Desa atau pejabat yang berwenang.</li>
                    <li>Pemohon menerima surat yang sudah jadi.</li>
                </ol>

                <div class="service-meta">
                    <div class="meta-item">
                        <h4><i class="far fa-clock"></i> Waktu Pelayanan</h4>
                        <p>15 - 30 Menit (jika persyaratan lengkap dan pejabat berada di tempat).</p>
                    </div>
                    <div class="meta-item">
                        <h4><i class="fas fa-money-bill-wave"></i> Biaya</h4>
                        <p>Tidak dipungut biaya / Gratis.</p>
                    </div>
                </div>
            </div>

            <aside class="service-sidebar">
                <div class="sidebar-widget">
                    <h4>Layanan Lainnya</h4>
                    <ul class="service-list">
                        <li><a href="#">Perizinan Usaha</a></li>
                        <li><a href="#">Kesehatan</a></li>
                        <li><a href="#">Pendidikan</a></li>
                        <li><a href="#">Bantuan Sosial</a></li>
                        <li><a href="#">Infrastruktur</a></li>
                    </ul>
                </div>
                <div class="sidebar-widget help-widget">
                    <h4><i class="fas fa-question-circle"></i> Butuh Bantuan?</h4>
                    <p>Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi petugas pelayanan kami.</p>
                    <a href="#kontak" class="btn btn-primary">Hubungi Kami</a>
                </div>
            </aside>
        </div>
    </section>
@endsection
