@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Hubungi Kami</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route(name: 'kontak.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="contact-page-section section-padding">
        <div class="container">
            <div class="section-title">Informasi & Formulir Kontak</div>
            <p class="section-subtitle">
                Kami siap melayani Anda. Jangan ragu untuk menghubungi kami melalui detail di bawah atau kirimkan pesan
                melalui formulir kapan saja.
            </p>
            <div class="contact-grid">
                <div class="contact-info">
                    <h3>Informasi Kontak</h3>
                    <ul class="contact-details-list">
                        <li class="contact-item">
                            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="contact-text">
                                <label>Alamat</label>
                                <span>Jl. Raya Sumur Kumbang, Kec. Kalianda<br>Kabupaten Lampung Selatan, 35551</span>
                            </div>
                        </li>
                        <li class="contact-item">
                            <div class="contact-icon"><i class="fas fa-phone"></i></div>
                            <div class="contact-text">
                                <label>Telepon</label>
                                <span>(021) 123-4567<br>+62 812-3456-7890</span>
                            </div>
                        </li>
                        <li class="contact-item">
                            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                            <div class="contact-text">
                                <label>Email</label>
                                <span>info@sumurkumbang.id<br>kepala@sumurkumbang.id</span>
                            </div>
                        </li>
                        <li class="contact-item">
                            <div class="contact-icon"><i class="far fa-clock"></i></div>
                            <div class="contact-text">
                                <label>Jam Pelayanan</label>
                                <span>Senin - Jumat: 08:00 - 16:00 WIB<br>Sabtu: 08:00 - 12:00 WIB</span>
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
                    <p>Sampaikan pertanyaan, saran, atau pengaduan Anda kepada kami.</p>
                    <form class="contact-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact-name">Nama Lengkap</label>
                                <input type="text" id="contact-name" name="name" placeholder="Masukkan nama lengkap"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="contact-phone">No. Telepon</label>
                                <input type="tel" id="contact-phone" name="phone"
                                    placeholder="Masukkan nomor telepon">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-email">Email</label>
                            <input type="email" id="contact-email" name="email" placeholder="Masukkan alamat email"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="contact-subject">Subjek</label>
                            <input type="text" id="contact-subject" name="subject" placeholder="Masukkan subjek pesan">
                        </div>
                        <div class="form-group">
                            <label for="contact-message">Pesan</label>
                            <textarea id="contact-message" name="message" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-full">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="map-section">
        <h2 class="section-title">Peta Lokasi Kantor Desa</h2>
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15878.94101967261!2d105.59015148943534!3d-5.772596489445161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e411516768a3563%3A0x4039d80b2210430!2sKantor%20Kepala%20Desa%20Sumur%20Kumbang!5e0!3m2!1sid!2sid!4v1723728154561!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection
