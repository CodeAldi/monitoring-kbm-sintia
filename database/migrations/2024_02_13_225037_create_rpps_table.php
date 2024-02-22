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
        Schema::create('rpp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_mapel_id')->constrained('guru_mapel')->cascade('onUpdate')->cascade('onDelete');
            $table->string('materi_pokok');
            $table->integer('jumlah_pertemuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rpp');
    }
};
