<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('gejala', function (Blueprint $table) {
            $table->renameColumn('bobot_fuzzy', 'bobot_cf');
        });
    }

    public function down(): void
    {
        Schema::table('gejala', function (Blueprint $table) {
            $table->renameColumn('bobot_cf', 'bobot_fuzzy');
        });
    }
};
