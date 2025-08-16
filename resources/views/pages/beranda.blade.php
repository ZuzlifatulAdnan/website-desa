@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="hero" id="beranda">
        <div class="container hero-container">
            <div class="hero-content">
                <h1>Selamat Datang di<br />Desa Sumur Kumbang</h1>
                <p>
                    Desa wisata yang indah di kaki Gunung Rajabasa dengan berbagai
                    destinasi menarik. Nikmati keindahan alam dan warisan budaya yang
                    lestari.
                </p>
                <div class="hero-buttons">
                    <a href="#layanan" class="btn btn-primary">Layanan Warga <i class="fas fa-arrow-right"></i></a>
                    <a href="#wisata" class="btn btn-secondary">Jelajahi Wisata</a>
                </div>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <i class="fas fa-users"></i>
                    <div>
                        <span class="stat-number">2,847</span>
                        <span class="stat-label">Penduduk</span>
                    </div>
                </div>
                <div class="stat-item">
                    <i class="fas fa-home"></i>
                    <div>
                        <span class="stat-number">783</span>
                        <span class="stat-label">Kepala Keluarga</span>
                    </div>
                </div>
                <div class="stat-item">
                    <i class="fas fa-mountain"></i>
                    <div>
                        <span class="stat-number">15.2</span>
                        <span class="stat-label">Luas Wilayah (km²)</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="services section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Layanan Desa</h2>
            <p class="section-subtitle">
                Berbagai layanan prima yang kami sediakan untuk kemudahan dan
                kesejahteraan warga desa.
            </p>
            <div class="grid-container">
                <div class="card">
                    <div class="card-icon icon-blue">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3>Surat Keterangan</h3>
                    <p>
                        Pembuatan berbagai surat keterangan seperti KTP, KK, surat
                        pindah, dan lainnya.
                    </p>
                    <a href="{{ route('layanan.create') }}" class="card-link">Pelajari Lebih Lanjut <i
                            class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card">
                    <div class="card-icon icon-green">
                        <i class="fas fa-store"></i>
                    </div>
                    <h3>Perizinan Usaha</h3>
                    <p>
                        Pengurusan izin usaha mikro, kecil, dan menengah untuk warga
                        desa.
                    </p>
                    <a href="{{ route('layanan.create') }}" class="card-link">Pelajari Lebih Lanjut <i
                            class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card">
                    <div class="card-icon icon-red">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3>Kesehatan</h3>
                    <p>
                        Layanan kesehatan dasar dan program vaksinasi untuk seluruh
                        keluarga.
                    </p>
                    <a href="{{ route('layanan.create') }}" class="card-link">Pelajari Lebih Lanjut <i
                            class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card">
                    <div class="card-icon icon-purple">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Pendidikan</h3>
                    <p>
                        Program beasiswa dan bantuan pendidikan untuk anak-anak
                        berprestasi.
                    </p>
                    <a href="{{ route('layanan.create') }}" class="card-link">Pelajari Lebih Lanjut <i
                            class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card">
                    <div class="card-icon icon-orange">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3>Bantuan Sosial</h3>
                    <p>Program bantuan untuk keluarga kurang mampu dan benda.</p>
                    <a href="{{ route('layanan.create') }}" class="card-link">Pelajari Lebih Lanjut <i
                            class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card">
                    <div class="card-icon icon-gray"><i class="fas fa-road"></i></div>
                    <h3>Infrastruktur</h3>
                    <p>
                        Pengadaan dan pemeliharaan jalan, drainase, dan fasilitas umum.
                    </p>
                    <a href="{{ route('layanan.create') }}" class="card-link">Pelajari Lebih Lanjut <i
                            class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('layanan.index') }}" class="btn btn-primary">Lihat Semua Layanan</a>
            </div>
        </div>
    </section>

    <section id="wisata" class="destinations section-padding">
        <div class="container">
            <h2 class="section-title">Destinasi Wisata</h2>
            <p class="section-subtitle">
                Jelajahi keindahan alam dan warisan budaya Desa Sumur Kumbang yang
                memukau.
            </p>
            <div class="grid-container">
                <div class="destination-card">
                    <div class="card-image-wrapper">
                        <img src="https://placehold.co/400x300/a3e635/ffffff?text=Teropong+Kota"
                            alt="Pemandangan kota dari ketinggian" loading="lazy" />
                        <span class="badge badge-easy">Mudah</span>
                    </div>
                    <div class="card-content">
                        <div class="card-title-group">
                            <div class="card-icon icon-blue">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h3>Teropong Kota</h3>
                        </div>
                        <p>
                            Spot terbaik untuk melihat pemandangan kota Bandar Lampung
                            dari ketinggian. Nikmati sunset yang memukau dan udara sejuk
                            pegunungan.
                        </p>
                        <div class="card-info-bar">
                            <span><i class="far fa-clock"></i> 2-3 jam</span>
                            <span><i class="fas fa-map-marker-alt"></i> Sumur Kumbang</span>
                        </div>
                        <a href="{{ route('wisata.create') }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="destination-card">
                    <div class="card-image-wrapper">
                        <img src="https://placehold.co/400x300/86efac/ffffff?text=Gunung+Rajabasa"
                            alt="Jalur pendakian di Gunung Rajabasa" loading="lazy" />
                        <span class="badge badge-hard">Sulit</span>
                    </div>
                    <div class="card-content">
                        <div class="card-title-group">
                            <div class="card-icon icon-green">
                                <i class="fas fa-mountain"></i>
                            </div>
                            <h3>Pendakian Gunung Rajabasa</h3>
                        </div>
                        <p>
                            Gunung berapi aktif dengan ketinggian 1.281 mdpl. Jalur
                            pendakian yang menantang dengan pemandangan spektakuler di
                            puncak.
                        </p>
                        <div class="card-info-bar">
                            <span><i class="far fa-clock"></i> 6-8 jam</span>
                            <span><i class="fas fa-map-marker-alt"></i> Sumur Kumbang</span>
                        </div>
                        <a href="{{ route('wisata.create') }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="destination-card">
                    <div class="card-image-wrapper">
                        <img src="https://placehold.co/400x300/4ade80/ffffff?text=Petilasan"
                            alt="Area Petilasan Syekh Mashur" loading="lazy" />
                        <span class="badge badge-easy">Mudah</span>
                    </div>
                    <div class="card-content">
                        <div class="card-title-group">
                            <div class="card-icon icon-purple">
                                <i class="fas fa-place-of-worship"></i>
                            </div>
                            <h3>Petilasan Syekh Mashur</h3>
                        </div>
                        <p>
                            Wisata religi bersejarah yang menjadi tempat ziarah. Situs
                            makam utama terkenal dengan arsitektur tradisional yang
                            menarik.
                        </p>
                        <div class="card-info-bar">
                            <span><i class="far fa-clock"></i> 1-2 jam</span>
                            <span><i class="fas fa-map-marker-alt"></i> Sumur Kumbang</span>
                        </div>
                        <a href="{{ route('wisata.create') }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="cta-wisata">
                <h2>Butuh Panduan Wisata?</h2>
                <p>
                    Hubungi pemandu wisata lokal untuk pengalaman yang lebih berkesan
                    dan aman.
                </p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-primary">Hubungi Pemandu</a>
                    <a href="#" class="btn btn-outline">Lihat Paket Wisata</a>
                </div>
            </div>
        </div>
    </section>

    <section id="budaya" class="culture section-padding destinations">
        <div class="container">
            <h2 class="section-title">Budaya & Tradisi</h2>
            <p class="section-subtitle">
                Warisan budaya luhur yang tetap lestari dan menjadi identitas Desa
                Sumur Kumbang.
            </p>
            <div class="two-columns">
                <div class="culture-image-container">
                    <img src="https://placehold.co/600x650/22c55e/ffffff?text=Kuliner+Tradisi"
                        alt="Makanan tradisional Ruwat Bumi" loading="lazy" />
                    <span class="badge badge-tradition">Tradisi Luhur</span>
                </div>
                <div class="culture-content">
                    <div class="card-icon icon-orange">
                        <i class="far fa-heart"></i>
                    </div>
                    <h3>Ruwat Bumi</h3>
                    <p>
                        Tradisi adat tahunan untuk membersihkan dan mensucikan bumi
                        desa. Upacara ini dilakukan sebagai bentuk syukur kepada Tuhan
                        dan permohonan kesuburan serta kesabaran tanah.
                    </p>
                    <div class="info-tags">
                        <span><i class="far fa-calendar-alt"></i> Setiap Tahun</span>
                        <span><i class="fas fa-users"></i> Seluruh Warga</span>
                    </div>
                    <div class="activity-section">
                        <h4>Rangkaian Kegiatan:</h4>
                        <ul class="activity-list">
                            <li>Pemberian makan leluhur</li>
                            <li>Kenduri bersama</li>
                            <li>Doa keselamatan desa</li>
                            <li>Pertunjukan seni tradisional</li>
                        </ul>
                    </div>
                    <a href="{{ route('budaya.index') }}" class="btn btn-primary btn-full">Pelajari Lebih Lanjut <i
                            class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="cta-budaya">
                <h2>Ikut Serta dalam Tradisi Desa</h2>
                <p>
                    Bergabunglah dengan masyarakat dalam melestarikan budaya dan
                    tradisi luhur. Setiap partisipasi Anda sangat berarti untuk
                    keberlangsungan warisan budaya desa.
                </p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-primary">Jadwal Kegiatan Budaya</a>
                    <a href="#" class="btn btn-outline">Sejarah Tradisi</a>
                </div>
            </div>
        </div>
    </section>

    <section id="berita" class="news section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Berita & Pengumuman</h2>
            <p class="section-subtitle">
                Informasi terkini seputar kegiatan dan program desa untuk warga.
            </p>
            <div class="grid-container">
                <div class="news-card">
                    <img src="https://placehold.co/400x300/84cc16/ffffff?text=Pembangunan+Jalan"
                        alt="Proyek pembangunan jalan desa" loading="lazy" />
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="category-tag tag-green">Infrastruktur</span>
                            <span class="news-date"><i class="far fa-calendar-alt"></i> 15 Desember 2024</span>
                        </div>
                        <h3>Pembangunan Jalan Desa Fase 2 Dimulai</h3>
                        <p>
                            Proyek pembangunan jalan desa fase 2 sepanjang 2 km telah
                            dimulai dan diperkirakan selesai dalam 3 bulan ke depan.
                        </p>
                        <a href="{{ route('berita.create') }}" class="read-more-link">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="news-card">
                    <img src="https://placehold.co/400x300/a3e635/ffffff?text=Pelatihan+UMKM"
                        alt="Ibu-ibu PKK mengikuti pelatihan UMKM" loading="lazy" />
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="category-tag tag-blue">Ekonomi</span>
                            <span class="news-date"><i class="far fa-calendar-alt"></i> 12 Desember 2024</span>
                        </div>
                        <h3>Program Pelatihan UMKM untuk Ibu-Ibu PKK</h3>
                        <p>
                            Desa Sejahtera mengadakan pelatihan keterampilan membuat
                            kerajinan tangan dan pengolahan makanan untuk meningkatkan
                            ekonomi keluarga.
                        </p>
                        <a href="{{ route('berita.create') }}" class="read-more-link">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="news-card">
                    <img src="https://placehold.co/400x300/bef264/ffffff?text=Vaksinasi"
                        alt="Obat-obatan dan kapsul untuk vaksinasi" loading="lazy" />
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="category-tag tag-red">Kesehatan</span>
                            <span class="news-date"><i class="far fa-calendar-alt"></i> 10 Desember 2024</span>
                        </div>
                        <h3>Vaksinasi COVID-19 Booster Gratis</h3>
                        <p>
                            Puskesmas bekerjasama dengan pemerintah desa mengadakan
                            vaksinasi booster gratis untuk semua warga yang sudah memenuhi
                            syarat.
                        </p>
                        <a href="{{ route('berita.create') }}" class="read-more-link">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('berita.index') }}" class="btn btn-outline">Lihat Semua Berita</a>
            </div>
        </div>
    </section>

    <section id="kontak" class="contact section-padding destinations">
        <div class="container">
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-subtitle">
                Kami siap melayani Anda. Jangan ragu untuk menghubungi kami kapan
                saja.
            </p>
            <div class="contact-grid">
                <div class="contact-info">
                    <h3>Informasi Kontak</h3>
                    <ul class="contact-details-list">
                        <li class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <label>Alamat</label>
                                <span>Jl. Raya Sumur Kumbang, Kec. Kalianda<br />Kabupaten
                                    Lampung Selatan, 35551</span>
                            </div>
                        </li>
                        <li class="contact-item">
                            <div class="contact-icon"><i class="fas fa-phone"></i></div>
                            <div class="contact-text">
                                <label>Telepon</label>
                                <span>(021) 123-4567<br />+62 812-3456-7890</span>
                            </div>
                        </li>
                        <li class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <label>Email</label>
                                <span>info@sumurkumbang.id<br />kepala@sumurkumbang.id</span>
                            </div>
                        </li>
                        <li class="contact-item">
                            <div class="contact-icon"><i class="far fa-clock"></i></div>
                            <div class="contact-text">
                                <label>Jam Pelayanan</label>
                                <span>Senin - Jumat: 08:00 - 16:00 WIB<br />Sabtu: 08:00 -
                                    12:00 WIB</span>
                            </div>
                        </li>
                    </ul>
                    <div class="social-follow">
                        <h4>Ikuti Kami</h4>
                        <div class="social-icons">
                            <a href="#" aria-label="Kunjungi Facebook kami"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="Kunjungi Instagram kami"><i class="fab fa-instagram"></i></a>
                            <a href="#" aria-label="Kunjungi Website kami"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
                <div class="form-wrapper">
                    <h3>Kirim Pesan</h3>
                    <p>
                        Sampaikan pertanyaan, saran, atau pengaduan Anda kepada kami.
                    </p>
                    <form class="contact-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact-name">Nama Lengkap</label>
                                <input type="text" id="contact-name" name="name"
                                    placeholder="Masukkan nama lengkap" required />
                            </div>
                            <div class="form-group">
                                <label for="contact-phone">No. Telepon</label>
                                <input type="tel" id="contact-phone" name="phone"
                                    placeholder="Masukkan nomor telepon" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-email">Email</label>
                            <input type="email" id="contact-email" name="email" placeholder="Masukkan alamat email"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="contact-subject">Subjek</label>
                            <input type="text" id="contact-subject" name="subject"
                                placeholder="Masukkan subjek pesan" />
                        </div>
                        <div class="form-group">
                            <label for="contact-message">Pesan</label>
                            <textarea id="contact-message" name="message" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-full">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
