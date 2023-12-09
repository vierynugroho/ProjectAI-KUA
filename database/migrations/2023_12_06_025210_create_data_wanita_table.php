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
        Schema::create('data_wanita', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('wanita__nama_lengkap', 60);
            $table->string('wanita__kk', 255)->default('');
            $table->string('wanita__ktp', 255)->default('');
            $table->string('wanita__akta_ayah', 255)->default('');
            $table->string('wanita__akta_ibu', 255)->default('');
            $table->double('wanita__cf_kk')->default(0)->max(1);
            $table->double('wanita__cf_ktp')->default(0)->max(1);
            $table->double('wanita__cf_akta_ayah')->default(0)->max(1);
            $table->double('wanita__cf_akta_ibu')->default(0)->max(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_wanita');
    }
};
