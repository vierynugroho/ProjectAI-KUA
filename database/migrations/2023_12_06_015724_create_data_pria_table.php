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
            $table->string('pria__nama_lengkap', 60);
            $table->string('pria__kk', 255)->default('');
            $table->string('pria__ktp', 255)->default('');
            $table->string('pria__akta_ayah', 255)->default('');
            $table->string('pria__akta_ibu', 255)->default('');
            $table->double('pria__cf_kk')->default(0)->max(1);
            $table->double('pria__cf_ktp')->default(0)->max(1);
            $table->double('pria__cf_akta_ayah')->default(0)->max(1);
            $table->double('pria__cf_akta_ibu')->default(0)->max(1);
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
