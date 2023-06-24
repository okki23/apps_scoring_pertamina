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
        //
        Schema::create('trans_event', function (Blueprint $table) {
            $table->id();
            $table->string('nopek');
            $table->integer('id_jenis_olahraga');
            $table->integer('kehadiran');
            $table->integer('menit');
            $table->string('foto_tampak_depan');
            $table->string('foto_tampak_samping');
            $table->string('upload_hasil_mcu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans_event');
        // 
    }
};
