@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="hero" id="beranda">
        <div class="container hero-container">
            <div class="hero-content">
                <h1>Selamat Datang di<br />{{ $desa->nama_desa ?? 'Desa Kami' }}</h1>
                <p>
                    {{ $desa->footer_deskripsi ?? 'Desa yang indah dengan berbagai destinasi menarik. Nikmati keindahan alam dan warisan budaya yang lestari.' }}
                </p>
                <div class="hero-buttons">
                    <a href="{{ route('layanan.index') }}" class="btn btn-primary">Layanan Warga <i class="fas fa-arrow-right"></i></a>
                    <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Jelajahi Wisata</a>
                </div>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <i class="fas fa-users"></i>
                    <div>
                        <span class="stat-number">{{ number_format($desa->jumlah_penduduk ?? 0, 0, ',', '.') }}</span>
                        <span class="stat-label">Penduduk</span>
                    </div>
                </div>
                <div class="stat-item">
                    <i class="fas fa-home"></i>
                    <div>
                        <span class="stat-number">{{ number_format($desa->jumlah_kk ?? 0, 0, ',', '.') }}</span>
                        <span class="stat-label">Kepala Keluarga</span>
                    </div>
                </div>
                <div class="stat-item">
                    <i class="fas fa-mountain"></i>
                    <div>
                        <span class="stat-number">{{ $desa->luas_wilayah ?? '-' }}</span>
                        <span class="stat-label">Luas Wilayah</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($pengumumans->isNotEmpty())
        <div class="announcement-bar">
            <div class="container">
                <span class="announcement-label"><i class="fas fa-bullhorn"></i> Pengumuman</span>
                <div class="announcement-track">
                    @foreach ($pengumumans as $p)
                        <a href="{{ route('pengumuman.show', $p->slug) }}">{{ $p->judul }}</a>
                        @if (!$loop->last) <span class="dot">&bull;</span> @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <section id="layanan" class="services section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Layanan Desa</h2>
            <p class="section-subtitle">
                Berbagai layanan prima yang kami sediakan untuk kemudahan dan kesejahteraan warga desa.
            </p>
            <div class="grid-container">
                @php $iconColors = ['icon-blue','icon-green','icon-red','icon-purple','icon-orange','icon-gray']; @endphp
                @forelse ($layanans as $layanan)
                    <div class="card">
                        <div class="card-icon {{ $iconColors[$loop->index % count($iconColors)] }}">
                            <i class="fas {{ $layanan->icon ?: 'fa-file-alt' }}"></i>
                        </div>
                        <h3>{{ $layanan->judul }}</h3>
                        <p>{{ Str::limit($layanan->deskripsi, 110) }}</p>
                        <a href="{{ route('layanan.show', $layanan->slug) }}" class="card-link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                    </div>
                @empty
                    <p class="empty-state">Belum ada data layanan.</p>
                @endforelse
            </div>
            <div class="text-center">
                <a href="{{ route('layanan.index') }}" class="btn btn-primary">Lihat Semua Layanan</a>
            </div>
        </div>
    </section>

    <section id="wisata" class="destinations section-padding">
        <div class="container">
            <h2 class="section-title">Destinasi Wisata</h2>
            <p class="section-subtitle">Jelajahi keindahan alam dan warisan budaya {{ $desa->nama_desa ?? 'desa' }} yang memukau.</p>
            <div class="grid-container">
                @forelse ($wisatas as $wisata)
                    <div class="destination-card">
                        <div class="card-image-wrapper">
                            <img src="{{ $wisata->gambar_url }}" alt="{{ $wisata->judul }}" loading="lazy" />
                            @if ($wisata->is_featured)
                                <span class="badge badge-easy">Unggulan</span>
                            @endif
                        </div>
                        <div class="card-content">
                            <div class="card-title-group">
                                <div class="card-icon icon-green"><i class="fas fa-map-marker-alt"></i></div>
                                <h3>{{ $wisata->judul }}</h3>
                            </div>
                            <p>{{ Str::limit($wisata->deskripsi, 120) }}</p>
                            <div class="card-info-bar">
                                <span><i class="far fa-clock"></i> {{ $wisata->jam_buka ? \Illuminate\Support\Str::of($wisata->jam_buka)->substr(0,5) : 'Setiap hari' }}</span>
                                <span><i class="fas fa-ticket-alt"></i> {{ $wisata->harga_tiket ?: 'Gratis' }}</span>
                            </div>
                            <a href="{{ route('wisata.show', $wisata->slug) }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @empty
                    <p class="empty-state">Belum ada destinasi wisata.</p>
                @endforelse
            </div>
            <div class="text-center">
                <a href="{{ route('wisata.index') }}" class="btn btn-outline">Lihat Semua Wisata</a>
            </div>
        </div>
    </section>

    @if ($budayas->isNotEmpty())
        @php $budaya = $budayas->first(); @endphp
        <section id="budaya" class="culture section-padding destinations">
            <div class="container">
                <h2 class="section-title">Budaya & Tradisi</h2>
                <p class="section-subtitle">Warisan budaya luhur yang tetap lestari dan menjadi identitas {{ $desa->nama_desa ?? 'desa' }}.</p>
                <div class="two-columns">
                    <div class="culture-image-container">
                        <img src="{{ $budaya->gambar_url }}" alt="{{ $budaya->judul }}" loading="lazy" />
                        <span class="badge badge-tradition">Tradisi Luhur</span>
                    </div>
                    <div class="culture-content">
                        <div class="card-icon icon-orange"><i class="far fa-heart"></i></div>
                        <h3>{{ $budaya->judul }}</h3>
                        <p>{{ Str::limit($budaya->deskripsi, 320) }}</p>
                        <div class="info-tags">
                            <span><i class="far fa-calendar-alt"></i> {{ $budaya->jadwal ?: 'Rutin' }}</span>
                            <span><i class="fas fa-users"></i> Seluruh Warga</span>
                        </div>
                        @if (count($budaya->aktivitas_array))
                            <div class="activity-section">
                                <h4>Rangkaian Kegiatan:</h4>
                                <ul class="activity-list">
                                    @foreach (array_slice($budaya->aktivitas_array, 0, 4) as $aktivitas)
                                        <li>{{ $aktivitas }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <a href="{{ route('budaya.show', $budaya->slug) }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="text-center" style="margin-top: 3rem;">
                    <a href="{{ route('budaya.index') }}" class="btn btn-outline">Lihat Semua Budaya</a>
                </div>
            </div>
        </section>
    @endif

    <section id="berita" class="news section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Berita & Pengumuman</h2>
            <p class="section-subtitle">Informasi terkini seputar kegiatan dan program desa untuk warga.</p>
            <div class="grid-container">
                @forelse ($artikels as $artikel)
                    <div class="news-card">
                        <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" loading="lazy" />
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
                    <p class="empty-state">Belum ada berita.</p>
                @endforelse
            </div>
            <div class="text-center">
                <a href="{{ route('berita.index') }}" class="btn btn-outline">Lihat Semua Berita</a>
            </div>
        </div>
    </section>

    <section id="kontak" class="contact section-padding destinations">
        <div class="container">
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-subtitle">Kami siap melayani Anda. Jangan ragu untuk menghubungi kami kapan saja.</p>
            <div class="contact-grid">
                <div class="contact-info">
                    <h3>Informasi Kontak</h3>
                    <ul class="contact-details-list">
                        <li class="contact-item">
                            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="contact-text">
                                <label>Alamat</label>
                                <span>{{ $desa->alamat ?? '-' }}</span>
                            </div>
                        </li>
                        @if ($desa->telepon ?? false)
                            <li class="contact-item">
                                <div class="contact-icon"><i class="fas fa-phone"></i></div>
                                <div class="contact-text">
                                    <label>Telepon</label>
                                    <span>{{ $desa->telepon }}</span>
                                </div>
                            </li>
                        @endif
                        @if ($desa->email ?? false)
                            <li class="contact-item">
                                <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                                <div class="contact-text">
                                    <label>Email</label>
                                    <span>{{ $desa->email }}</span>
                                </div>
                            </li>
                        @endif
                        <li class="contact-item">
                            <div class="contact-icon"><i class="far fa-clock"></i></div>
                            <div class="contact-text">
                                <label>Jam Pelayanan</label>
                                <span>{{ $desa->jam_pelayanan ?? 'Senin - Jumat: 08:00 - 16:00 WIB' }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="form-wrapper">
                    @include('components.kontak-form')
                </div>
            </div>
        </div>
    </section>
@endsection
