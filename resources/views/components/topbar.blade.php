<div class="top-bar">
    <div class="container">
        <div class="top-bar-left">
            @if ($desa->telepon ?? false)
                <span><i class="fas fa-phone"></i> {{ $desa->telepon }}</span>
            @endif
            <span><i class="fas fa-map-marker-alt"></i>
                {{ $desa->nama_desa ?? 'Desa' }}{{ ($desa->kecamatan ?? false) ? ', Kec. ' . $desa->kecamatan : '' }}{{ ($desa->kabupaten ?? false) ? ', ' . $desa->kabupaten : '' }}</span>
        </div>
        <div class="top-bar-right">
            <span><i class="far fa-clock"></i> Jam Pelayanan: {{ $desa->jam_pelayanan ?? 'Senin - Jumat, 08:00 - 16:00 WIB' }}</span>
        </div>
    </div>
</div>
