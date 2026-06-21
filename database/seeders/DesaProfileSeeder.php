<?php

namespace Database\Seeders;

use App\Models\DesaProfile;
use Illuminate\Database\Seeder;

class DesaProfileSeeder extends Seeder
{
    public function run(): void
    {
        $geojson = json_encode([
            'type' => 'FeatureCollection',
            'features' => [[
                'type' => 'Feature',
                'properties' => ['name' => 'Desa Sumur Kumbang'],
                'geometry' => [
                    'type' => 'Polygon',
                    'coordinates' => [[
                        [105.560, -5.740],
                        [105.585, -5.742],
                        [105.590, -5.760],
                        [105.575, -5.775],
                        [105.555, -5.768],
                        [105.560, -5.740],
                    ]],
                ],
            ]],
        ]);

        DesaProfile::current()->update([
            'nama_web' => 'Portal Desa Digital',
            'warna_primary' => '#22c55e',
            'warna_secondary' => '#15803d',
            'footer_deskripsi' => 'Desa Sumur Kumbang adalah destinasi wisata yang menawarkan keindahan alam dan budaya. Kami berkomitmen mengembangkan potensi desa sambil melestarikan lingkungan.',

            'nama_desa' => 'Desa Sumur Kumbang',
            'kepala_desa' => 'H. Sulaeman',
            'kecamatan' => 'Kalianda',
            'kabupaten' => 'Lampung Selatan',
            'provinsi' => 'Lampung',
            'kode_pos' => '35551',
            'alamat' => 'Jl. Raya Sumur Kumbang, Kec. Kalianda, Kabupaten Lampung Selatan, 35551',
            'tahun_berdiri' => '1928',
            'luas_wilayah' => '15.2 km²',

            'sambutan' => '<p>Assalamualaikum Warahmatullahi Wabarakatuh. Selamat datang di website resmi Desa Sumur Kumbang. Website ini kami hadirkan sebagai sarana keterbukaan informasi publik, pelayanan, dan media komunikasi antara pemerintah desa dengan masyarakat.</p><p>Semoga website ini memberikan manfaat bagi seluruh warga dan pihak yang membutuhkan informasi tentang desa kami.</p>',
            'sejarah' => '<p>Desa Sumur Kumbang didirikan pada tahun 1928 oleh sekelompok transmigran dari Jawa Tengah. Nama "Sumur Kumbang" diambil dari sebuah sumur tua yang dikelilingi oleh banyak kumbang, yang dianggap sebagai pertanda kesuburan oleh para pendiri desa.</p><p>Awalnya, desa ini berfokus pada pertanian padi dan palawija. Seiring berjalannya waktu, Desa Sumur Kumbang berkembang pesat, diversifikasi ekonominya meluas ke perkebunan kopi dan kakao, serta mulai mengembangkan potensi pariwisatanya pada awal tahun 2000-an berkat keindahan alam di kaki Gunung Rajabasa.</p>',
            'visi' => 'Mewujudkan Desa Sumur Kumbang yang Maju, Mandiri, Sejahtera, dan Berbudaya Berlandaskan Iman dan Taqwa.',
            'misi' => [
                'Meningkatkan kualitas sumber daya manusia melalui pendidikan dan kesehatan.',
                'Mengembangkan potensi ekonomi lokal berbasis pertanian, perkebunan, dan pariwisata.',
                'Meningkatkan kualitas infrastruktur desa secara merata dan berkelanjutan.',
                'Melestarikan dan mengembangkan nilai-nilai budaya dan kearifan lokal.',
                'Menciptakan tata kelola pemerintahan desa yang bersih, transparan, dan akuntabel.',
            ],

            'telepon' => '(021) 123-4567',
            'whatsapp' => '6281234567890',
            'email' => 'info@sumurkumbang.id',
            'website' => 'https://sumurkumbang.id',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'youtube' => 'https://youtube.com',
            'tiktok' => 'https://tiktok.com',
            'jam_pelayanan' => 'Senin - Jumat, 08:00 - 16:00 WIB',

            'latitude' => '-5.7560',
            'longitude' => '105.5730',
            'peta_zoom' => 13,
            'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15878.94101967261!2d105.59015148943534!3d-5.772596489445161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e411516768a3563%3A0x4039d80b2210430!2sKantor%20Kepala%20Desa%20Sumur%20Kumbang!5e0!3m2!1sid!2sid!4v1723728154561!5m2!1sid!2sid',
            'peta_geojson' => $geojson,

            'jumlah_penduduk' => 2847,
            'jumlah_kk' => 783,
            'jumlah_laki' => 1412,
            'jumlah_perempuan' => 1435,
            'jumlah_dusun' => 5,
        ]);
    }
}
