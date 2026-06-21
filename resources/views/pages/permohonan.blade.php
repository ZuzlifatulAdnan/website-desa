@extends('layouts.app')

@section('title', 'Permohonan Layanan')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>Permohonan Layanan Online</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('layanan.index') }}">Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Permohonan</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="contact-page-section section-padding">
        <div class="container">
            <h2 class="section-title">Ajukan & Lacak Permohonan</h2>
            <p class="section-subtitle">
                Ajukan permohonan layanan desa secara online tanpa harus datang ke kantor, lalu pantau statusnya
                menggunakan kode permohonan.
            </p>

            <div class="contact-grid">
                {{-- Form Ajukan --}}
                <div class="form-wrapper">
                    <h3>Formulir Permohonan</h3>

                    @if (session('kode'))
                        <div class="alert alert-success" style="flex-direction: column; align-items: flex-start;">
                            <span><i class="fas fa-check-circle"></i> {{ session('success') }}</span>
                            <span style="margin-top: .5rem;">Kode permohonan Anda: <strong style="font-size:1.8rem; letter-spacing:1px;">{{ session('kode') }}</strong></span>
                            <small>Simpan kode ini untuk melacak status permohonan Anda.</small>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> Mohon periksa kembali isian Anda.</div>
                    @endif

                    <form class="contact-form" action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="layanan_id">Jenis Layanan</label>
                            <select id="layanan_id" name="layanan_id" required>
                                <option value="">-- Pilih Layanan --</option>
                                @foreach ($layanans as $l)
                                    <option value="{{ $l->id }}" @selected(old('layanan_id') == $l->id || $terpilih === $l->slug)>{{ $l->judul }}</option>
                                @endforeach
                            </select>
                            @error('layanan_id') <small class="field-error">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="p-nama">Nama Lengkap</label>
                                <input type="text" id="p-nama" name="nama" value="{{ old('nama') }}" required>
                                @error('nama') <small class="field-error">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="p-nik">NIK</label>
                                <input type="text" id="p-nik" name="nik" value="{{ old('nik') }}" placeholder="16 digit (opsional)">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="p-telp">No. Telepon / WA</label>
                                <input type="tel" id="p-telp" name="no_telp" value="{{ old('no_telp') }}" required>
                                @error('no_telp') <small class="field-error">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="p-email">Email</label>
                                <input type="email" id="p-email" name="email" value="{{ old('email') }}" placeholder="Opsional">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="p-alamat">Alamat</label>
                            <input type="text" id="p-alamat" name="alamat" value="{{ old('alamat') }}">
                        </div>
                        <div class="form-group">
                            <label for="p-keperluan">Keperluan / Keterangan</label>
                            <textarea id="p-keperluan" name="keperluan" rows="4" required placeholder="Jelaskan keperluan permohonan Anda...">{{ old('keperluan') }}</textarea>
                            @error('keperluan') <small class="field-error">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="p-lampiran">Lampiran (PDF/JPG/PNG, maks 4MB)</label>
                            <input type="file" id="p-lampiran" name="lampiran" accept=".pdf,.jpg,.jpeg,.png">
                            @error('lampiran') <small class="field-error">{{ $message }}</small> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-full">Kirim Permohonan</button>
                    </form>
                </div>

                {{-- Lacak Status --}}
                <div class="contact-info">
                    <h3>Lacak Status Permohonan</h3>
                    <form action="{{ route('permohonan.lacak') }}" method="GET" class="search-form" style="margin-bottom: 2rem;">
                        <input type="text" name="kode" value="{{ $kodeDicari ?? '' }}" placeholder="Masukkan kode permohonan (mis. PMH-XXXX)">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>

                    @isset($kodeDicari)
                        @if ($permohonan)
                            <div class="lacak-result">
                                <div class="lacak-head">
                                    <span class="lacak-kode">{{ $permohonan->kode }}</span>
                                    <span class="status-badge status-{{ $permohonan->status }}">{{ $permohonan->status_label }}</span>
                                </div>
                                <ul class="info-list">
                                    <li><strong>Layanan:</strong> {{ $permohonan->layanan->judul ?? '-' }}</li>
                                    <li><strong>Pemohon:</strong> {{ $permohonan->nama }}</li>
                                    <li><strong>Tanggal:</strong> {{ $permohonan->created_at->translatedFormat('d F Y H:i') }}</li>
                                    @if ($permohonan->catatan)
                                        <li><strong>Catatan Petugas:</strong> {{ $permohonan->catatan }}</li>
                                    @endif
                                </ul>
                            </div>
                        @else
                            <div class="alert alert-error"><i class="fas fa-times-circle"></i> Permohonan dengan kode tersebut tidak ditemukan.</div>
                        @endif
                    @endisset

                    <div class="sidebar-widget help-widget" style="margin-top: 2rem;">
                        <h4><i class="fas fa-info-circle"></i> Alur Permohonan</h4>
                        <ol class="procedure-list" style="margin: 0;">
                            <li>Isi & kirim formulir permohonan.</li>
                            <li>Simpan kode permohonan yang muncul.</li>
                            <li>Petugas memproses permohonan Anda.</li>
                            <li>Pantau status melalui kode permohonan.</li>
                            <li>Ambil dokumen di kantor desa saat status <strong>Selesai</strong>.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
