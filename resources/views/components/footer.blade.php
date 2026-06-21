<footer class="main-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <div class="footer-identity">
                    <img src="{{ $desa?->logo_url ?? asset('img/logo/logo.png') }}" alt="Logo {{ $desa->nama_desa ?? 'Desa' }}" class="footer-logo-image">
                    <div>
                        <h4>{{ $desa->nama_desa ?? 'Desa' }}</h4>
                        <span>{{ ($desa->kecamatan ?? false) ? 'Kec. ' . $desa->kecamatan : '' }}{{ ($desa->kabupaten ?? false) ? ', ' . $desa->kabupaten : '' }}</span>
                    </div>
                </div>
                <p>
                    {{ $desa->footer_deskripsi ?? 'Website resmi desa untuk pelayanan publik, informasi, dan transparansi kepada masyarakat.' }}
                </p>
                <div class="social-icons">
                    @if ($desa->facebook ?? false)
                        <a href="{{ $desa->facebook }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if ($desa->instagram ?? false)
                        <a href="{{ $desa->instagram }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if ($desa->youtube ?? false)
                        <a href="{{ $desa->youtube }}" target="_blank" rel="noopener" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    @endif
                    @if ($desa->tiktok ?? false)
                        <a href="{{ $desa->tiktok }}" target="_blank" rel="noopener" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                    @endif
                    @if ($desa->whatsapp ?? false)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $desa->whatsapp) }}" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    @endif
                    @if ($desa->website ?? false)
                        <a href="{{ $desa->website }}" target="_blank" rel="noopener" aria-label="Website"><i class="fas fa-globe"></i></a>
                    @endif
                </div>
            </div>
            <div class="footer-col">
                <h4>Menu Utama</h4>
                <ul>
                    <li><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li><a href="{{ route('profile.index') }}">Profil Desa</a></li>
                    <li><a href="{{ route('layanan.index') }}">Layanan</a></li>
                    <li><a href="{{ route('wisata.index') }}">Wisata</a></li>
                    <li><a href="{{ route('budaya.index') }}">Budaya</a></li>
                    <li><a href="{{ route('galeri.index') }}">Galeri</a></li>
                    <li><a href="{{ route('berita.index') }}">Berita</a></li>
                    <li><a href="{{ route('kontak.index') }}">Kontak</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Kontak</h4>
                <ul class="contact-list">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $desa->alamat ?? ($desa->nama_desa ?? 'Desa') }}</span>
                    </li>
                    @if ($desa->telepon ?? false)
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>{{ $desa->telepon }}</span>
                        </li>
                    @endif
                    @if ($desa->email ?? false)
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>{{ $desa->email }}</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>
                &copy; {{ date('Y') }} {{ $desa->nama_desa ?? 'Desa' }}. Semua hak dilindungi undang-undang.
            </p>
        </div>
    </div>
</footer>
