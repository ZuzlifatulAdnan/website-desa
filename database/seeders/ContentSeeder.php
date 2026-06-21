<?php

namespace Database\Seeders;

use App\Models\Apbdes;
use App\Models\Aparatur;
use App\Models\Artikel;
use App\Models\Budaya;
use App\Models\Demografi;
use App\Models\Galeri;
use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\Pengumuman;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $userId = User::query()->min('id') ?? 1;

        // ---- Aparatur ----
        $aparaturs = [
            ['nama' => 'H. Sulaeman', 'posisi' => 'Kepala Desa', 'nip' => '197005101998031001'],
            ['nama' => 'Siti Aminah', 'posisi' => 'Sekretaris Desa', 'nip' => '198203122005012003'],
            ['nama' => 'Budi Santoso', 'posisi' => 'Kaur Keuangan', 'nip' => '198805152010011005'],
            ['nama' => 'Joko Susilo', 'posisi' => 'Kaur Perencanaan', 'nip' => '199001202012011007'],
            ['nama' => 'Dewi Lestari', 'posisi' => 'Kasi Pemerintahan', 'nip' => '199203102015022009'],
            ['nama' => 'Ahmad Fauzi', 'posisi' => 'Kasi Pelayanan', 'nip' => '199405182016011011'],
        ];
        foreach ($aparaturs as $i => $a) {
            Aparatur::create($a + ['order' => $i + 1]);
        }

        // ---- Demografi ----
        $demografi = [
            'pekerjaan' => ['Petani' => 980, 'Pedagang' => 420, 'PNS/TNI/Polri' => 180, 'Wiraswasta' => 560, 'Buruh' => 380, 'Lainnya' => 327],
            'pendidikan' => ['Tidak Sekolah' => 210, 'SD' => 820, 'SMP' => 740, 'SMA' => 760, 'Diploma/Sarjana' => 317],
            'agama' => ['Islam' => 2680, 'Kristen' => 92, 'Katolik' => 35, 'Hindu' => 28, 'Buddha' => 12],
            'usia' => ['0-14 tahun' => 712, '15-24 tahun' => 540, '25-54 tahun' => 1180, '55-64 tahun' => 245, '65+ tahun' => 170],
        ];
        foreach ($demografi as $kategori => $items) {
            $i = 0;
            foreach ($items as $label => $jumlah) {
                Demografi::create(['kategori' => $kategori, 'label' => $label, 'jumlah' => $jumlah, 'order' => $i++]);
            }
        }

        // ---- Layanan ----
        $layanans = [
            ['judul' => 'Surat Keterangan', 'icon' => 'fa-file-alt', 'deskripsi' => 'Pembuatan berbagai surat keterangan seperti domisili, usaha (SKU), tidak mampu (SKTM), dan lainnya.'],
            ['judul' => 'Perizinan Usaha', 'icon' => 'fa-store', 'deskripsi' => 'Pengurusan izin usaha mikro, kecil, dan menengah untuk warga desa.'],
            ['judul' => 'Layanan Kesehatan', 'icon' => 'fa-heartbeat', 'deskripsi' => 'Layanan kesehatan dasar, posyandu, dan program vaksinasi untuk seluruh keluarga.'],
            ['judul' => 'Bantuan Pendidikan', 'icon' => 'fa-graduation-cap', 'deskripsi' => 'Program beasiswa dan bantuan pendidikan untuk anak-anak berprestasi.'],
            ['judul' => 'Bantuan Sosial', 'icon' => 'fa-hands-helping', 'deskripsi' => 'Program bantuan untuk keluarga kurang mampu dan kelompok rentan.'],
            ['judul' => 'Administrasi Kependudukan', 'icon' => 'fa-id-card', 'deskripsi' => 'Pengurusan KTP, Kartu Keluarga, akta kelahiran, dan dokumen kependudukan lainnya.'],
        ];
        foreach ($layanans as $i => $l) {
            Layanan::create($l + [
                'persyaratan' => "Fotokopi KTP pemohon\nFotokopi Kartu Keluarga (KK)\nSurat Pengantar dari RT/RW setempat\nDokumen pendukung sesuai jenis layanan",
                'prosedur' => "Datang ke kantor desa membawa dokumen persyaratan\nMenuju loket pelayanan dan sampaikan keperluan\nPetugas memverifikasi kelengkapan dokumen\nPetugas memproses permohonan\nDokumen ditandatangani pejabat berwenang\nPemohon menerima dokumen yang telah selesai",
                'waktu_pelayanan' => '15 - 30 Menit',
                'biaya' => 'Gratis',
                'is_active' => true,
                'order' => $i + 1,
            ]);
        }

        // ---- Wisata ----
        $wisatas = [
            ['judul' => 'Teropong Kota', 'deskripsi' => 'Spot terbaik untuk melihat pemandangan kota Bandar Lampung dari ketinggian. Nikmati sunset yang memukau dan udara sejuk pegunungan.', 'harga_tiket' => 'Rp 10.000', 'is_featured' => true, 'lokasi' => 'Lereng Gunung Rajabasa, Sumur Kumbang', 'fasilitas' => 'Toilet, Parkir, Warung, Gardu Pandang, Mushola'],
            ['judul' => 'Pendakian Gunung Rajabasa', 'deskripsi' => 'Gunung berapi aktif dengan ketinggian 1.281 mdpl. Jalur pendakian yang menantang dengan pemandangan spektakuler di puncak.', 'harga_tiket' => 'Rp 15.000', 'is_featured' => true, 'lokasi' => 'Gunung Rajabasa', 'fasilitas' => 'Basecamp, Pemandu, Area Camping'],
            ['judul' => 'Petilasan Syekh Mashur', 'deskripsi' => 'Wisata religi bersejarah yang menjadi tempat ziarah. Situs makam terkenal dengan arsitektur tradisional yang menarik.', 'harga_tiket' => 'Gratis', 'is_featured' => false, 'lokasi' => 'Sumur Kumbang', 'fasilitas' => 'Parkir, Mushola, Toilet'],
            ['judul' => 'Air Terjun Way Tayas', 'deskripsi' => 'Air terjun tersembunyi dengan kolam alami yang jernih, cocok untuk berenang dan bersantai bersama keluarga.', 'harga_tiket' => 'Rp 5.000', 'is_featured' => false, 'lokasi' => 'Sumur Kumbang', 'fasilitas' => 'Parkir, Warung, Kamar Bilas'],
        ];
        foreach ($wisatas as $w) {
            Wisata::create($w + ['jam_buka' => '08:00', 'jam_tutup' => '18:00', 'is_active' => true]);
        }

        // ---- Budaya ----
        $budayas = [
            ['judul' => 'Ruwat Bumi', 'jadwal' => 'Setiap Tahun (Bulan Suro)', 'deskripsi' => 'Tradisi adat tahunan untuk membersihkan dan mensucikan bumi desa. Upacara ini dilakukan sebagai bentuk syukur kepada Tuhan dan permohonan kesuburan serta keselamatan tanah.', 'aktivitas' => "Pemberian sesaji leluhur\nKenduri bersama\nDoa keselamatan desa\nPertunjukan seni tradisional"],
            ['judul' => 'Sedekah Laut', 'jadwal' => 'Tahunan', 'deskripsi' => 'Ritual para nelayan sebagai ucapan syukur atas hasil laut dan permohonan keselamatan saat melaut.', 'aktivitas' => "Larung sesaji ke laut\nDoa bersama\nLomba perahu hias\nHiburan rakyat"],
            ['judul' => 'Pesta Panen Raya', 'jadwal' => 'Musiman', 'deskripsi' => 'Perayaan meriah yang diisi dengan berbagai pertunjukan seni dan kuliner khas desa setelah masa panen.', 'aktivitas' => "Karnaval hasil bumi\nPagelaran seni\nBazar kuliner\nLomba tradisional"],
        ];
        foreach ($budayas as $b) {
            Budaya::create($b + ['is_active' => true]);
        }

        // ---- Kategori + Artikel ----
        $kategoriData = ['Infrastruktur', 'Ekonomi', 'Kesehatan', 'Pendidikan', 'Pemerintahan'];
        $kategoris = collect($kategoriData)->mapWithKeys(fn ($n) => [$n => Kategori::create(['nama' => $n])->id]);

        $artikels = [
            ['judul' => 'Pembangunan Jalan Desa Fase 2 Dimulai', 'kategori' => 'Infrastruktur', 'ringkasan' => 'Proyek pembangunan jalan desa fase 2 sepanjang 2 km telah dimulai dan diperkirakan selesai dalam 3 bulan ke depan.'],
            ['judul' => 'Program Pelatihan UMKM untuk Ibu-Ibu PKK', 'kategori' => 'Ekonomi', 'ringkasan' => 'Pemerintah desa mengadakan pelatihan keterampilan membuat kerajinan tangan dan pengolahan makanan untuk meningkatkan ekonomi keluarga.'],
            ['judul' => 'Vaksinasi Booster Gratis untuk Warga', 'kategori' => 'Kesehatan', 'ringkasan' => 'Puskesmas bekerjasama dengan pemerintah desa mengadakan vaksinasi booster gratis untuk semua warga yang memenuhi syarat.'],
            ['judul' => 'Penyaluran Beasiswa Anak Berprestasi', 'kategori' => 'Pendidikan', 'ringkasan' => 'Sebanyak 25 pelajar berprestasi menerima beasiswa pendidikan dari dana desa tahun ini.'],
            ['judul' => 'Musyawarah Desa Tahun Anggaran Baru', 'kategori' => 'Pemerintahan', 'ringkasan' => 'Pemerintah desa menggelar musyawarah desa untuk menyusun rencana kerja dan anggaran tahun mendatang.'],
            ['judul' => 'Gotong Royong Membersihkan Saluran Irigasi', 'kategori' => 'Infrastruktur', 'ringkasan' => 'Warga bergotong royong membersihkan saluran irigasi untuk mengantisipasi musim hujan.'],
        ];
        foreach ($artikels as $i => $a) {
            Artikel::create([
                'judul' => $a['judul'],
                'slug' => Str::slug($a['judul']),
                'ringkasan' => $a['ringkasan'],
                'deskripsi' => '<p><strong>SUMUR KUMBANG</strong> - ' . $a['ringkasan'] . '</p><p>Kegiatan ini merupakan bagian dari program kerja pemerintah desa yang bertujuan meningkatkan kesejahteraan dan pelayanan kepada masyarakat. Pemerintah desa mengajak seluruh warga untuk berpartisipasi aktif demi kemajuan bersama.</p><p>Informasi lebih lanjut dapat menghubungi kantor desa pada jam pelayanan.</p>',
                'kategori_id' => $kategoris[$a['kategori']],
                'user_id' => $userId,
                'status' => 'published',
                'is_featured' => $i === 0,
                'views' => rand(20, 500),
                'published_at' => Carbon::now()->subDays($i * 3),
            ]);
        }

        // ---- Galeri ----
        $galeri = [
            ['judul' => 'Kerja Bakti Warga', 'kategori' => 'Kegiatan'],
            ['judul' => 'Peresmian Balai Desa', 'kategori' => 'Pembangunan'],
            ['judul' => 'Pemandangan Gunung Rajabasa', 'kategori' => 'Wisata'],
            ['judul' => 'Festival Budaya Desa', 'kategori' => 'Budaya'],
            ['judul' => 'Posyandu Balita', 'kategori' => 'Kegiatan'],
            ['judul' => 'Pembangunan Jembatan', 'kategori' => 'Pembangunan'],
            ['judul' => 'Air Terjun Way Tayas', 'kategori' => 'Wisata'],
            ['judul' => 'Pawai Adat 17 Agustus', 'kategori' => 'Budaya'],
        ];
        foreach ($galeri as $i => $g) {
            Galeri::create([
                'judul' => $g['judul'],
                'kategori' => $g['kategori'],
                'gambar' => '',
                'order' => $i,
            ]);
        }

        // ---- APBDes ----
        $tahun = (int) date('Y');
        $apbdes = [
            ['jenis' => 'pendapatan', 'uraian' => 'Dana Desa (DD)', 'jumlah' => 1200000000],
            ['jenis' => 'pendapatan', 'uraian' => 'Alokasi Dana Desa (ADD)', 'jumlah' => 650000000],
            ['jenis' => 'pendapatan', 'uraian' => 'Pendapatan Asli Desa', 'jumlah' => 150000000],
            ['jenis' => 'belanja', 'uraian' => 'Bidang Pembangunan', 'jumlah' => 900000000],
            ['jenis' => 'belanja', 'uraian' => 'Penyelenggaraan Pemerintahan', 'jumlah' => 500000000],
            ['jenis' => 'belanja', 'uraian' => 'Pembinaan Kemasyarakatan', 'jumlah' => 300000000],
            ['jenis' => 'belanja', 'uraian' => 'Pemberdayaan Masyarakat', 'jumlah' => 250000000],
            ['jenis' => 'pembiayaan', 'uraian' => 'SILPA Tahun Sebelumnya', 'jumlah' => 50000000],
        ];
        foreach ($apbdes as $i => $a) {
            Apbdes::create($a + ['tahun' => $tahun, 'order' => $i]);
        }

        // ---- Pengumuman ----
        $pengumuman = [
            ['judul' => 'Jadwal Pelayanan Administrasi Bulan Ini', 'tipe' => 'info', 'isi' => '<p>Pelayanan administrasi desa buka Senin - Jumat pukul 08:00 - 16:00 WIB. Mohon membawa dokumen persyaratan yang lengkap.</p>'],
            ['judul' => 'Pemadaman Listrik Bergilir', 'tipe' => 'penting', 'isi' => '<p>Diberitahukan kepada seluruh warga bahwa akan ada pemadaman listrik bergilir pada akhir pekan ini untuk pemeliharaan jaringan.</p>'],
            ['judul' => 'Kegiatan Posyandu dan Imunisasi', 'tipe' => 'kegiatan', 'isi' => '<p>Posyandu balita dan imunisasi akan dilaksanakan di balai desa. Diharapkan kehadiran ibu dan balita.</p>'],
        ];
        foreach ($pengumuman as $i => $p) {
            Pengumuman::create([
                'judul' => $p['judul'],
                'slug' => Str::slug($p['judul']),
                'isi' => $p['isi'],
                'tipe' => $p['tipe'],
                'is_active' => true,
                'tanggal' => Carbon::now()->subDays($i * 2),
            ]);
        }

        // ---- Permohonan Layanan (contoh) ----
        $layananIds = Layanan::query()->pluck('id')->all();
        $permohonan = [
            ['nama' => 'Andi Pratama', 'no_telp' => '081298765432', 'keperluan' => 'Pembuatan surat keterangan domisili untuk keperluan bank.', 'status' => 'menunggu'],
            ['nama' => 'Rina Marlina', 'no_telp' => '085611223344', 'keperluan' => 'Surat keterangan tidak mampu untuk beasiswa anak.', 'status' => 'diproses'],
            ['nama' => 'Slamet Riyadi', 'no_telp' => '082155667788', 'keperluan' => 'Pengurusan izin usaha warung sembako.', 'status' => 'selesai'],
        ];
        foreach ($permohonan as $i => $p) {
            \App\Models\PermohonanLayanan::create([
                'layanan_id' => $layananIds[$i % count($layananIds)],
                'nama' => $p['nama'],
                'nik' => '18010112340000' . $i,
                'no_telp' => $p['no_telp'],
                'alamat' => 'Dusun ' . ($i + 1) . ', Desa Sumur Kumbang',
                'keperluan' => $p['keperluan'],
                'status' => $p['status'],
                'catatan' => $p['status'] === 'selesai' ? 'Dokumen sudah dapat diambil di kantor desa.' : null,
            ]);
        }
    }
}
