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
        Schema::create('rpp_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rpp_id')->constrained('rpp')->cascade('onUpdate')->cascade('onDelete');
            $table->integer('pertemuan');
            $table->string('kompetensi_dasar');
            $table->string('tujuan_pembelajaran');
            $table->text('langkah_pembelajaran_isi');
            $table->text('assesmen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rpp_items');
    }
};
