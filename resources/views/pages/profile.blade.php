@extends('layouts.app')

@section('title', 'Profil Desa')

@push('styles')
    @if (($desa->peta_geojson ?? false) || (($desa->latitude ?? false) && ($desa->longitude ?? false)))
        <link rel="stylesheet" href="https://unpkg.com/maplibre-gl@4.7.1/dist/maplibre-gl.css" />
    @endif
@endpush

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Profil {{ $desa->nama_desa ?? 'Desa' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profil Desa</li>
                </ol>
            </nav>
        </div>
    </section>

    @if ($desa->sambutan ?? false)
        <section class="sambutan-section section-padding">
            <div class="container two-columns">
                <div class="profil-image-container">
                    <img src="{{ $desa?->foto_kantor_url ?? $desa?->logo_url }}" alt="Kantor {{ $desa->nama_desa ?? 'Desa' }}" loading="lazy">
                </div>
                <div class="profil-content">
                    <h2 class="section-title-left">Sambutan Kepala Desa</h2>
                    <div class="rich-text">{!! $desa->sambutan !!}</div>
                    @if ($desa->kepala_desa ?? false)
                        <p class="signature"><strong>{{ $desa->kepala_desa }}</strong><br><span>Kepala Desa</span></p>
                    @endif
                </div>
            </div>
        </section>
    @endif

    <section class="profil-section section-padding bg-light">
        <div class="container two-columns">
            <div class="profil-content">
                <h2 class="section-title-left">Sejarah Singkat</h2>
                <div class="rich-text">
                    {!! $desa->sejarah ?: '<p>Belum ada data sejarah desa.</p>' !!}
                </div>
            </div>
            <div class="profil-image-container">
                <img src="{{ $desa?->foto_sampul_url ?? $desa?->logo_url }}" alt="Foto {{ $desa->nama_desa ?? 'Desa' }}" loading="lazy">
            </div>
        </div>
    </section>

    <section class="visi-misi-section section-padding">
        <div class="container">
            <h2 class="section-title">Visi & Misi</h2>
            <div class="visi-misi-grid">
                <div class="visi-card">
                    <h3><i class="fas fa-eye"></i> Visi</h3>
                    <p>{{ $desa->visi ?: 'Belum ada visi yang ditetapkan.' }}</p>
                </div>
                <div class="misi-card">
                    <h3><i class="fas fa-bullseye"></i> Misi</h3>
                    <ul>
                        @forelse ($desa?->misi_list ?? [] as $misi)
                            <li>{{ $misi }}</li>
                        @empty
                            <li>Belum ada misi yang ditetapkan.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="pemerintahan-section section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Struktur Pemerintahan Desa</h2>
            <div class="pemerintahan-grid">
                @forelse ($aparaturs as $aparatur)
                    <div class="aparat-card">
                        <img src="{{ $aparatur->gambar_url }}" alt="Foto {{ $aparatur->nama }}">
                        <h4>{{ $aparatur->nama }}</h4>
                        <span>{{ $aparatur->posisi }}</span>
                        @if ($aparatur->nip)
                            <small class="nip">NIP. {{ $aparatur->nip }}</small>
                        @endif
                    </div>
                @empty
                    <p class="empty-state">Belum ada data aparatur desa.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="demografi-section section-padding">
        <div class="container">
            <h2 class="section-title">Data Demografi</h2>
            <div class="demografi-stats">
                <div class="stat-item-profil">
                    <i class="fas fa-users"></i>
                    <div>
                        <span class="stat-number">{{ number_format($desa->jumlah_penduduk ?? 0, 0, ',', '.') }}</span>
                        <span class="stat-label">Total Penduduk</span>
                    </div>
                </div>
                <div class="stat-item-profil">
                    <i class="fas fa-male"></i>
                    <div>
                        <span class="stat-number">{{ number_format($desa->jumlah_laki ?? 0, 0, ',', '.') }}</span>
                        <span class="stat-label">Laki-laki</span>
                    </div>
                </div>
                <div class="stat-item-profil">
                    <i class="fas fa-female"></i>
                    <div>
                        <span class="stat-number">{{ number_format($desa->jumlah_perempuan ?? 0, 0, ',', '.') }}</span>
                        <span class="stat-label">Perempuan</span>
                    </div>
                </div>
                <div class="stat-item-profil">
                    <i class="fas fa-home"></i>
                    <div>
                        <span class="stat-number">{{ number_format($desa->jumlah_kk ?? 0, 0, ',', '.') }}</span>
                        <span class="stat-label">Kepala Keluarga</span>
                    </div>
                </div>
            </div>

            @php $kategoriLabel = \App\Models\Demografi::KATEGORI; @endphp
            @if ($demografi->isNotEmpty())
                <div class="demografi-tables">
                    @foreach ($demografi as $kategori => $items)
                        <div class="demografi-card">
                            <h3>{{ $kategoriLabel[$kategori] ?? ucfirst($kategori) }}</h3>
                            @php $total = $items->sum('jumlah'); @endphp
                            <ul class="demografi-bars">
                                @foreach ($items as $item)
                                    <li>
                                        <div class="bar-label"><span>{{ $item->label }}</span><span>{{ number_format($item->jumlah, 0, ',', '.') }}</span></div>
                                        <div class="bar-track"><div class="bar-fill" style="width: {{ $total > 0 ? round($item->jumlah / $total * 100) : 0 }}%"></div></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @if (($apbdes ?? collect())->isNotEmpty())
        <section class="apbdes-section section-padding bg-light">
            <div class="container">
                <h2 class="section-title">Transparansi APBDes {{ $tahunApbdes }}</h2>
                <p class="section-subtitle">Ringkasan Anggaran Pendapatan dan Belanja Desa.</p>
                <div class="apbdes-grid">
                    @foreach (['pendapatan' => 'Pendapatan', 'belanja' => 'Belanja', 'pembiayaan' => 'Pembiayaan'] as $jenis => $label)
                        @if ($apbdes->has($jenis))
                            <div class="apbdes-card apbdes-{{ $jenis }}">
                                <h3>{{ $label }}</h3>
                                <p class="apbdes-total">Rp {{ number_format($apbdes[$jenis]->sum('jumlah'), 0, ',', '.') }}</p>
                                <ul>
                                    @foreach ($apbdes[$jenis] as $item)
                                        <li><span>{{ $item->uraian }}</span><span>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (($desa->peta_geojson ?? false) || (($desa->latitude ?? false) && ($desa->longitude ?? false)))
        <section class="peta-section section-padding">
            <div class="container">
                <h2 class="section-title">Peta Wilayah Desa</h2>
                <p class="section-subtitle">Batas wilayah {{ $desa->nama_desa ?? 'desa' }}.</p>
                <div id="peta-desa" class="peta-desa peta-gl"></div>
            </div>
        </section>
    @endif
@endsection

@push('scripts')
    @if (($desa->peta_geojson ?? false) || (($desa->latitude ?? false) && ($desa->longitude ?? false)))
        <script src="https://unpkg.com/maplibre-gl@4.7.1/dist/maplibre-gl.js"></script>
        <script>
            // Peta wilayah desa — MapLibre GL (vektor modern) + overlay GeoJSON.
            (function () {
                if (typeof maplibregl === 'undefined' || !document.getElementById('peta-desa')) return;

                const primary = @js($desa->warna_primary ?: '#22c55e');
                const secondary = @js($desa->warna_secondary ?: '#15803d');
                const nama = @js($desa->nama_desa ?? 'Desa');
                const center = [{{ $desa->longitude ?: 118 }}, {{ $desa->latitude ?: -2.5 }}];
                const zoom = {{ $desa->peta_zoom ?: 13 }};

                const map = new maplibregl.Map({
                    container: 'peta-desa',
                    center, zoom,
                    attributionControl: { compact: true },
                    style: {
                        version: 8,
                        glyphs: 'https://demotiles.maplibre.org/font/{fontstack}/{range}.pbf',
                        sources: {
                            basemap: {
                                type: 'raster',
                                tiles: [
                                    'https://a.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}@2x.png',
                                    'https://b.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}@2x.png',
                                    'https://c.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}@2x.png',
                                ],
                                tileSize: 256,
                                attribution: '&copy; OpenStreetMap &copy; CARTO',
                            },
                        },
                        layers: [{ id: 'basemap', type: 'raster', source: 'basemap' }],
                    },
                });

                map.addControl(new maplibregl.NavigationControl(), 'top-right');
                map.addControl(new maplibregl.FullscreenControl(), 'top-right');
                map.scrollZoom.disable();
                map.getContainer().addEventListener('click', () => map.scrollZoom.enable());

                map.on('load', () => {
                    @if ($desa->peta_geojson ?? false)
                        try {
                            const geojson = @json(json_decode($desa->peta_geojson));
                            map.addSource('wilayah', { type: 'geojson', data: geojson });
                            map.addLayer({ id: 'wilayah-fill', type: 'fill', source: 'wilayah',
                                paint: { 'fill-color': primary, 'fill-opacity': 0.3 } });
                            map.addLayer({ id: 'wilayah-line', type: 'line', source: 'wilayah',
                                paint: { 'line-color': secondary, 'line-width': 3 } });

                            const b = new maplibregl.LngLatBounds();
                            const walk = (c) => { if (typeof c[0] === 'number') b.extend(c); else c.forEach(walk); };
                            const addGeom = (g) => g && g.coordinates && walk(g.coordinates);
                            if (geojson.type === 'FeatureCollection') (geojson.features || []).forEach(f => addGeom(f.geometry));
                            else if (geojson.type === 'Feature') addGeom(geojson.geometry);
                            else addGeom(geojson);
                            if (!b.isEmpty()) map.fitBounds(b, { padding: 50, duration: 0 });
                        } catch (e) { console.warn('GeoJSON tidak valid:', e); }
                    @endif

                    new maplibregl.Marker({ color: secondary })
                        .setLngLat(center)
                        .setPopup(new maplibregl.Popup({ offset: 24 }).setHTML('<strong>' + nama + '</strong>'))
                        .addTo(map);
                });
            })();
        </script>
    @endif
@endpush
