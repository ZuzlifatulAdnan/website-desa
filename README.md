# 🏡 Website Desa — Starter Package Multi-Desa

Website profil desa lengkap berbasis **Laravel 12** + **Filament 4** dengan dashboard admin, manajemen konten, transparansi anggaran, peta wilayah GeoJSON, dan **Role-Based Access Control (Spatie Permission)**. Dirancang sebagai *starter package* yang bisa dipakai banyak desa cukup dengan mengubah pengaturan dari panel admin (nama, logo, favicon, warna, kontak, dll).

## ✨ Fitur Utama

### Halaman Publik (Front-end)
- **Beranda** — hero statistik desa, layanan, wisata, budaya, berita terbaru, banner pengumuman, formulir kontak.
- **Profil Desa** — sambutan kepala desa, sejarah, visi & misi, struktur aparatur, data demografi (grafik), transparansi **APBDes**, dan **peta wilayah desa (GeoJSON + Leaflet/OpenStreetMap)**.
- **Layanan** — daftar & detail layanan (persyaratan, prosedur, biaya, waktu).
- **Permohonan Layanan Online** — warga mengajukan permohonan layanan + unggah lampiran, mendapat **kode permohonan**, dan **melacak status** (Menunggu → Diproses → Selesai/Ditolak). Petugas memproses dari panel admin.
- **Peta wilayah modern** — peta vektor interaktif **MapLibre GL** (basemap CARTO Voyager) yang menggambar **batas wilayah GeoJSON** sesuai warna tema, tanpa API key.
- **Wisata** — daftar & detail destinasi (fasilitas, jam buka, tiket, peta).
- **Budaya** — daftar & detail tradisi/budaya.
- **Galeri** — galeri foto kegiatan dengan filter kategori.
- **Berita** — daftar (pencarian + kategori + populer) & detail artikel + tombol berbagi.
- **Pengumuman** — detail pengumuman desa.
- **Kontak** — informasi kontak + formulir pesan (tersimpan ke database).

### Dashboard Admin (`/admin`)
- Widget ringkasan (penduduk, berita, wisata, pesan belum dibaca), grafik demografi, dan pesan masuk terbaru.
- **Pengaturan & Profil Desa** (singleton) dengan tab: Branding, Identitas, Profil, Kontak & Sosial Media, Lokasi & Peta (GeoJSON), Statistik.
- Manajemen: Berita, Kategori, Pengumuman, Wisata, Budaya, Layanan, Galeri, Aparatur, Demografi, APBDes, Pesan Masuk, **Permohonan Layanan** (badge jumlah baru).
- Manajemen **Pengguna** & **Role/Hak Akses**.
- Branding panel (nama, logo, favicon, warna utama) otomatis mengikuti pengaturan desa.

### Role-Based Access Control (Spatie Permission)
| Role | Akses |
|------|-------|
| **Super Admin** | Akses penuh + kelola pengguna & role (god mode via `Gate::before`) |
| **Admin** | Kelola semua konten, profil desa, APBDes, pesan — **tanpa** kelola pengguna/role |
| **Operator** | Hanya kelola konten publik (berita, wisata, budaya, layanan, galeri, pengumuman) |

## 🔑 Akun Default (setelah seeding)

| Email | Password | Role |
|-------|----------|------|
| `admin@gmail.com` | `12345678` | Super Admin |
| `superadmin@desa.id` | `password` | Super Admin |
| `admin@desa.id` | `password` | Admin |
| `operator@desa.id` | `password` | Operator |

> ⚠️ Ganti password default ini sebelum produksi.

## 🚀 Instalasi

```bash
# 1. Dependency
composer install

# 2. Konfigurasi
cp .env.example .env
php artisan key:generate
# Sesuaikan koneksi database di .env (default: MySQL "web_desa")

# 3. Database + data contoh
php artisan migrate:fresh --seed

# 4. Symlink storage (untuk upload gambar)
php artisan storage:link

# 5. Jalankan
php artisan serve
```

Buka: `http://localhost:8000` (publik) dan `http://localhost:8000/admin` (panel admin).

## 🎨 Menjadikannya Website Desa Lain

Cukup masuk ke **Admin → Profil Desa → Pengaturan & Profil**, lalu ubah:
- **Branding**: nama website, logo, favicon, warna utama & sekunder.
- **Identitas**: nama desa, kecamatan, kabupaten, alamat, dll.
- **Profil**: sambutan, sejarah, visi & misi.
- **Kontak & Sosial Media**.
- **Lokasi & Peta**: koordinat + tempel **GeoJSON** batas wilayah desa.
- **Statistik** penduduk.

Tidak perlu menyentuh kode untuk rebranding antar-desa.

## 🛠️ Teknologi
- Laravel 12, PHP 8.2+
- Filament 4 (panel admin)
- Spatie Laravel Permission 8 (RBAC)
- MapLibre GL JS + CARTO basemap (peta GeoJSON vektor, tanpa API key)
- MySQL / MariaDB

## ✅ Pengujian
```bash
php artisan test
```
Termasuk smoke test panel admin & verifikasi RBAC (`tests/Feature/AdminSmokeTest.php`).
