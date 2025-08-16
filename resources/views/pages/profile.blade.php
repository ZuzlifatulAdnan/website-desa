@extends('layouts.app')

@section('title', 'Profile Desa')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Profil Desa Sumur Kumbang</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profil Desa</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="profil-section section-padding">
        <div class="container two-columns">
            <div class="profil-content">
                <h2 class="section-title-left">Sejarah Singkat</h2>
                <p>Desa Sumur Kumbang didirikan pada tahun 1928 oleh sekelompok transmigran dari Jawa Tengah. Nama "Sumur
                    Kumbang" diambil dari sebuah sumur tua yang dikelilingi oleh banyak kumbang, yang dianggap sebagai
                    pertanda kesuburan oleh para pendiri desa.</p>
                <p>Awalnya, desa ini berfokus pada pertanian padi dan palawija. Seiring berjalannya waktu, Desa Sumur
                    Kumbang berkembang pesat, diversifikasi ekonominya meluas ke perkebunan kopi dan kakao, serta mulai
                    mengembangkan potensi pariwisatanya pada awal tahun 2000-an berkat keindahan alam di kaki Gunung
                    Rajabasa.</p>
            </div>
            <div class="profil-image-container">
                <img src="https://placehold.co/500x350/a3e635/ffffff?text=Foto+Arsip+Desa"
                    alt="Foto arsip Desa Sumur Kumbang" loading="lazy">
            </div>
        </div>
    </section>

    <section class="visi-misi-section section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Visi & Misi</h2>
            <div class="visi-misi-grid">
                <div class="visi-card">
                    <h3><i class="fas fa-eye"></i> Visi</h3>
                    <p>"Mewujudkan Desa Sumur Kumbang yang Maju, Mandiri, Sejahtera, dan Berbudaya Berlandaskan Iman dan
                        Taqwa."</p>
                </div>
                <div class="misi-card">
                    <h3><i class="fas fa-bullseye"></i> Misi</h3>
                    <ul>
                        <li>Meningkatkan kualitas sumber daya manusia melalui pendidikan dan kesehatan.</li>
                        <li>Mengembangkan potensi ekonomi lokal berbasis pertanian, perkebunan, dan pariwisata.</li>
                        <li>Meningkatkan kualitas infrastruktur desa secara merata dan berkelanjutan.</li>
                        <li>Melestarikan dan mengembangkan nilai-nilai budaya dan kearifan lokal.</li>
                        <li>Menciptakan tata kelola pemerintahan desa yang bersih, transparan, dan akuntabel.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="pemerintahan-section section-padding">
        <div class="container">
            <h2 class="section-title">Struktur Pemerintahan Desa</h2>
            <div class="pemerintahan-grid">
                <div class="aparat-card">
                    <img src="https://placehold.co/200x200/334155/ffffff?text=Foto" alt="Foto Kepala Desa">
                    <h4>Bapak H. Sulaeman</h4>
                    <span>Kepala Desa</span>
                </div>
                <div class="aparat-card">
                    <img src="https://placehold.co/200x200/334155/ffffff?text=Foto" alt="Foto Sekretaris Desa">
                    <h4>Ibu Siti Aminah</h4>
                    <span>Sekretaris Desa</span>
                </div>
                <div class="aparat-card">
                    <img src="https://placehold.co/200x200/334155/ffffff?text=Foto" alt="Foto Kaur Keuangan">
                    <h4>Bapak Budi Santoso</h4>
                    <span>Kaur Keuangan</span>
                </div>
                <div class="aparat-card">
                    <img src="https://placehold.co/200x200/334155/ffffff?text=Foto" alt="Foto Kaur Perencanaan">
                    <h4>Bapak Joko Susilo</h4>
                    <span>Kaur Perencanaan</span>
                </div>
            </div>
        </div>
    </section>

    <section class="demografi-section section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Data Demografi</h2>
            <div class="demografi-grid">
                <div class="demografi-stats">
                    <div class="stat-item-profil">
                        <i class="fas fa-users"></i>
                        <div>
                            <span class="stat-number">2,847</span>
                            <span class="stat-label">Total Penduduk</span>
                        </div>
                    </div>
                    <div class="stat-item-profil">
                        <i class="fas fa-male"></i>
                        <div>
                            <span class="stat-number">1,412</span>
                            <span class="stat-label">Laki-laki</span>
                        </div>
                    </div>
                    <div class="stat-item-profil">
                        <i class="fas fa-female"></i>
                        <div>
                            <span class="stat-number">1,435</span>
                            <span class="stat-label">Perempuan</span>
                        </div>
                    </div>
                    <div class="stat-item-profil">
                        <i class="fas fa-home"></i>
                        <div>
                            <span class="stat-number">783</span>
                            <span class="stat-label">Kepala Keluarga</span>
                        </div>
                    </div>
                </div>
                <div class="demografi-chart">
                    <img src="https://placehold.co/500x300/e2e8f0/334155?text=Grafik+Pekerjaan+Warga"
                        alt="Grafik demografi pekerjaan warga">
                </div>
            </div>
        </div>
    </section>
@endsection
