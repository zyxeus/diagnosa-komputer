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
        Schema::create('proses', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gejala');
            $table->string('kode_kerusakan');
            $table->decimal('nilai_cf', 3, 2);
            $table->timestamps();

            $table->foreign('kode_gejala')->references('kode_gejala')->on('gejala')->onDelete('cascade');
            $table->foreign('kode_kerusakan')->references('kode_kerusakan')->on('kerusakan')->onDelete('cascade');

            $table->unique(['kode_gejala', 'kode_kerusakan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proses');
    }
};
