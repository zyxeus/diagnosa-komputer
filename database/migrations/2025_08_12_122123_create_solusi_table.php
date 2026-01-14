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
        Schema::create('solusi', function (Blueprint $table) {
            $table->string('kode_solusi')->primary();
            $table->string('kode_kerusakan');         
            $table->text('deskripsi_solusi');
            
            $table->foreign('kode_kerusakan')
                ->references('kode_kerusakan')
                ->on('kerusakan')
                ->onDelete('cascade');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solusi');
    }
};
