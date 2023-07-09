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
            $table->string('nopek')->unique();
            $table->date('tanggal')->nullable();
            $table->string('wilayah')->nullable();
            $table->integer('jarak_tempuh')->nullable();
            $table->integer('menit')->nullable();
            $table->integer('menit_k50')->nullable();
            $table->integer('pht')->nullable();
            $table->integer('pkg')->nullable();
            $table->integer('pko')->nullable(); 
            $table->integer('minus_point')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('trans_event');
    }
};
