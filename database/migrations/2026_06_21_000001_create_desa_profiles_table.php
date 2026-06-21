<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('desa_profiles', function (Blueprint $table) {
            $table->id();

            // Branding situs (multi-desa starter)
            $table->string('nama_web')->default('Portal Desa Digital');
            $table->string('favicon')->nullable();
            $table->string('warna_primary')->default('#22c55e');
            $table->string('warna_secondary')->default('#15803d');
            $table->text('footer_deskripsi')->nullable();

            // Identitas
            $table->string('nama_desa')->default('Desa Sumur Kumbang');
            $table->string('kepala_desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->text('alamat')->nullable();

            // Konten profil
            $table->longText('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->json('misi')->nullable();
            $table->longText('sambutan')->nullable();

            // Media
            $table->string('logo')->nullable();
            $table->string('foto_kantor')->nullable();
            $table->string('foto_sampul')->nullable();

            // Kontak & sosial media
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('jam_pelayanan')->nullable();

            // Lokasi
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('maps_embed')->nullable();
            $table->string('maps_api_key')->nullable();
            $table->unsignedTinyInteger('peta_zoom')->default(13);
            $table->longText('peta_geojson')->nullable();

            // Statistik ringkas
            $table->string('luas_wilayah')->nullable();
            $table->unsignedInteger('jumlah_penduduk')->default(0);
            $table->unsignedInteger('jumlah_kk')->default(0);
            $table->unsignedInteger('jumlah_laki')->default(0);
            $table->unsignedInteger('jumlah_perempuan')->default(0);
            $table->unsignedInteger('jumlah_dusun')->default(0);
            $table->string('tahun_berdiri')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desa_profiles');
    }
};
