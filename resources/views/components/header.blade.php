<header id="main-header">
    <div class="container">
        <a href="{{ route('beranda.index') }}" class="header-identity">
            <img src="{{ $desa?->logo_url ?? asset('img/logo/logo.png') }}" alt="Logo {{ $desa->nama_desa ?? 'Desa' }}" class="header-logo-image">
            <div>
                <span class="header-title">{{ $desa->nama_desa ?? 'Desa' }}</span>
                <span class="header-subtitle">{{ ($desa->kecamatan ?? false) ? 'Kec. ' . $desa->kecamatan : '' }}{{ ($desa->kabupaten ?? false) ? ', ' . $desa->kabupaten : '' }}</span>
            </div>
        </a>
        <nav class="main-nav">
            <ul>
                <li><a href="{{ route('beranda.index') }}" class="{{ request()->routeIs('beranda.*') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ route('profile.index') }}" class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">Profil Desa</a></li>
                <li><a href="{{ route('layanan.index') }}" class="{{ request()->routeIs('layanan.*') ? 'active' : '' }}">Layanan</a></li>
                <li><a href="{{ route('wisata.index') }}" class="{{ request()->routeIs('wisata.*') ? 'active' : '' }}">Wisata</a></li>
                <li><a href="{{ route('budaya.index') }}" class="{{ request()->routeIs('budaya.*') ? 'active' : '' }}">Budaya</a></li>
                <li><a href="{{ route('galeri.index') }}" class="{{ request()->routeIs('galeri.*') ? 'active' : '' }}">Galeri</a></li>
                <li><a href="{{ route('berita.index') }}" class="{{ request()->routeIs('berita.*') ? 'active' : '' }}">Berita</a></li>
                <li><a href="{{ route('kontak.index') }}" class="{{ request()->routeIs('kontak.*') ? 'active' : '' }}">Kontak</a></li>
            </ul>
        </nav>
        <div class="header-extra">
            <button id="menu-toggle" class="menu-toggle" aria-label="Buka Menu Navigasi" aria-expanded="false">
                <i class="fas fa-bars" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</header>
