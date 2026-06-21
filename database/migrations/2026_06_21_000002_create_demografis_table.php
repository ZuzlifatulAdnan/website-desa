<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('demografis', function (Blueprint $table) {
            $table->id();
            // pekerjaan | pendidikan | agama | usia | dusun
            $table->string('kategori');
            $table->string('label');
            $table->unsignedInteger('jumlah')->default(0);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demografis');
    }
};
