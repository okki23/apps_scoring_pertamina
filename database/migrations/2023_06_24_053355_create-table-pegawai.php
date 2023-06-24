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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nopek')->unique();
            $table->string('nama');
            $table->integer('id_jenis_pekerjaan')->nullable();
            $table->integer('id_fungsi')->nullable();
            $table->integer('id_lokasi_kerja')->nullable();
            $table->integer('id_kategori')->nullable();
            $table->text('no_wa')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('size_baju')->nullable();
            $table->timestamps();
        });
         
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('pegawai');
    }
};
