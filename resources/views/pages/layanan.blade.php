@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
   
      <section class="page-header">
        <div class="container">
          <h1>Semua Layanan Desa</h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Layanan
              </li>
            </ol>
          </nav>
        </div>
      </section>

      <section class="services section-padding">
        <div class="container">
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
              <a href="{{ route('layanan.create') }}" class="card-link"
                >Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i
              ></a>
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
              <a href="{{ route('layanan.create') }}" class="card-link"
                >Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i
              ></a>
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
              <a href="{{ route('layanan.create') }}" class="card-link"
                >Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i
              ></a>
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
              <a href="{{ route('layanan.create') }}" class="card-link"
                >Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i
              ></a>
            </div>
            <div class="card">
              <div class="card-icon icon-orange">
                <i class="fas fa-hands-helping"></i>
              </div>
              <h3>Bantuan Sosial</h3>
              <p>Program bantuan untuk keluarga kurang mampu dan benda.</p>
              <a href="{{ route('layanan.create') }}" class="card-link"
                >Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i
              ></a>
            </div>
            <div class="card">
              <div class="card-icon icon-gray"><i class="fas fa-road"></i></div>
              <h3>Infrastruktur</h3>
              <p>
                Pengadaan dan pemeliharaan jalan, drainase, dan fasilitas umum.
              </p>
              <a href="{{ route('layanan.create') }}" class="card-link"
                >Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i
              ></a>
            </div>
            <div class="card">
              <div class="card-icon icon-blue">
                <i class="fas fa-house-damage"></i>
              </div>
              <h3>Pajak Bumi & Bangunan</h3>
              <p>
                Layanan bantuan untuk pengurusan dan pembayaran PBB tahunan.
              </p>
              <a href="{{ route('layanan.create') }}" class="card-link"
                >Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i
              ></a>
            </div>
            <div class="card">
              <div class="card-icon icon-red"><i class="fas fa-ring"></i></div>
              <h3>Administrasi Pernikahan</h3>
              <p>
                Pengurusan surat pengantar nikah dan dokumen pendukung lainnya.
              </p>
              <a href="{{ route('layanan.create') }}" class="card-link"
                >Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i
              ></a>
            </div>
            <div class="card">
              <div class="card-icon icon-gray">
                <i class="fas fa-cross"></i>
              </div>
              <h3>Surat Kematian</h3>
              <p>
                Layanan pembuatan akta kematian untuk keperluan administrasi
                lebih lanjut.
              </p>
              <a href="{{ route('layanan.create') }}" class="card-link"
                >Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i
              ></a>
            </div>
          </div>

          <div class="cta-bantuan">
            <h3>Tidak Menemukan Layanan yang Anda Cari?</h3>
            <p>
              Beberapa layanan mungkin memerlukan penanganan khusus. Silakan
              hubungi kami langsung untuk informasi lebih lanjut.
            </p>
            <a href="index.html#kontak" class="btn btn-primary">Hubungi Kami</a>
          </div>
          <nav class="pagination">
            <ul>
              <li><a href="#" class="page-link disabled">Sebelumnya</a></li>
              <li><a href="#" class="page-link active">1</a></li>
              <li><a href="#" class="page-link">2</a></li>
              <li><a href="#" class="page-link">3</a></li>
              <li><a href="#" class="page-link">Berikutnya</a></li>
            </ul>
          </nav>
        </div>
      </section>
    
@endsection