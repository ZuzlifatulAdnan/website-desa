@extends('layouts.app')

@section('title', 'Detail Berita')

@section('content')
    <section class="article-section section-padding">
        <div class="container detail-grid">
            <article class="article-content">
                <header class="article-header">
                    <div class="article-meta">
                        <a href="#" class="category-tag tag-green">Infrastruktur</a>
                        <span><i class="far fa-calendar-alt"></i> 15 Desember 2024</span>
                        <span><i class="far fa-user"></i> Admin Desa</span>
                    </div>
                    <h1 class="article-title">Pembangunan Jalan Desa Fase 2 Dimulai</h1>
                </header>
                <img src="https://placehold.co/800x500/84cc16/ffffff?text=Pembangunan+Jalan"
                    alt="Proyek pembangunan jalan desa" class="article-image">

                <div class="article-body">
                    <p><strong>SUMUR KUMBANG</strong> - Pemerintah Desa Sumur Kumbang secara resmi memulai proyek
                        pembangunan jalan desa fase kedua pada hari Senin (15/12). Proyek ini merupakan kelanjutan dari
                        program peningkatan infrastruktur yang bertujuan untuk mempermudah aksesibilitas dan mendorong
                        pertumbuhan ekonomi warga setempat.</p>
                    <p>Pembangunan jalan ini akan mencakup ruas jalan sepanjang 2 kilometer, menghubungkan Dusun Harapan
                        Jaya dengan pusat desa. Menurut Kepala Desa, Bapak H. Sulaeman, dana untuk proyek ini berasal dari
                        alokasi Dana Desa (DD) tahun anggaran 2024.</p>

                    <h3>Fokus pada Kualitas dan Ketahanan</h3>
                    <p>"Kami tidak hanya membangun, tetapi kami memastikan kualitasnya. Jalan ini akan menggunakan
                        konstruksi beton bertulang agar lebih tahan lama dan mampu menahan beban kendaraan berat pengangkut
                        hasil bumi," ujar Bapak Sulaeman saat diwawancarai di lokasi proyek.</p>

                    <blockquote>
                        <p>"Infrastruktur yang baik adalah kunci kemajuan. Dengan jalan yang mulus, biaya transportasi hasil
                            panen akan menurun dan mobilitas warga akan semakin lancar."</p>
                        <footer>— Bapak H. Sulaeman, Kepala Desa</footer>
                    </blockquote>

                    <p>Proyek ini diperkirakan akan memakan waktu selama tiga bulan dan melibatkan partisipasi aktif dari
                        warga sekitar melalui program padat karya tunai. Diharapkan dengan selesainya jalan ini, akses
                        anak-anak ke sekolah dan warga ke fasilitas kesehatan juga akan menjadi lebih mudah.</p>
                </div>

                <div class="share-buttons">
                    <strong>Bagikan Artikel:</strong>
                    <a href="#" class="share-btn facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                    <a href="#" class="share-btn twitter"><i class="fab fa-twitter"></i> Twitter</a>
                    <a href="#" class="share-btn whatsapp"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                </div>
            </article>

            <aside class="service-sidebar">
                <div class="sidebar-widget">
                    <h4>Berita Terbaru</h4>
                    <ul class="service-list">
                        <li><a href="#">Program Pelatihan UMKM untuk Ibu-Ibu PKK</a></li>
                        <li><a href="#">Vaksinasi COVID-19 Booster Gratis</a></li>
                        <li><a href="#">Pengumuman Jadwal Posyandu Bulan Ini</a></li>
                        <li><a href="#">Kerja Bakti Desa Membersihkan Saluran Irigasi</a></li>
                    </ul>
                </div>
                <div class="sidebar-widget">
                    <h4>Kategori Berita</h4>
                    <ul class="service-list">
                        <li><a href="#">Pemerintahan</a></li>
                        <li><a href="#">Ekonomi</a></li>
                        <li><a href="#">Infrastruktur</a></li>
                        <li><a href="#">Kesehatan</a></li>
                        <li><a href="#">Pendidikan</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>
@endsection
