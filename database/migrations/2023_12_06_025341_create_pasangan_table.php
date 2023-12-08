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
        Schema::create('pasangan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pria');
            $table->integer('id_wanita');
            $table->double('data_status')->default(0)->max(1);
            $table->timestamps();

            // foreign config
            $table->foreign('id_pria')->references('id')->on('data_pria');
            $table->foreign('id_wanita')->references('id')->on('data_wanita');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasangan');
    }
};
