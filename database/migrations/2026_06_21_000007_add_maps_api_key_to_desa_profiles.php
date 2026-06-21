<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('desa_profiles', 'maps_api_key')) {
            return;
        }

        Schema::table('desa_profiles', function (Blueprint $table) {
            $table->string('maps_api_key')->nullable()->after('maps_embed');
        });
    }

    public function down(): void
    {
        Schema::table('desa_profiles', function (Blueprint $table) {
            $table->dropColumn('maps_api_key');
        });
    }
};
