<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permohonan_layanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->foreignId('layanan_id')->constrained('layanans')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('nama');
            $table->string('nik', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('no_telp');
            $table->text('alamat')->nullable();
            $table->text('keperluan');
            $table->string('lampiran')->nullable();
            // menunggu | diproses | selesai | ditolak
            $table->string('status')->default('menunggu');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permohonan_layanans');
    }
};
