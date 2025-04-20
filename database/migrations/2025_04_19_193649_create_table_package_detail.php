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
        Schema::create('package_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id');
            $table->string('slug');
            $table->text('package_description');
            $table->string('maskapai');
            $table->string('hotel_madinah');
            $table->string('hotel_makkah');
            $table->string('harga_quad');
            $table->string('harga_triple');
            $table->string('harga_double');
            $table->text('perlengkapan');
            $table->text('dokumen_persyaratan');
            $table->text('syarat_ketentuan');
            $table->text('fasilitas');
            $table->text('itenary_media');
            $table->text('harga_mulai');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_detail');
    }
};
