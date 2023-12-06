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
        Schema::create('data_pria', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nama_lengkap', 60);
            $table->string('kk', 255)->default('');
            $table->string('ktp', 255)->default('');
            $table->string('akta_ayah', 255)->default('');
            $table->string('akta_ibu', 255)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
