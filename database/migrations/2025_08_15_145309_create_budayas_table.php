<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('budayas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->string('jadwal');
            $table->text('aktivitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budayas');
    }
};
