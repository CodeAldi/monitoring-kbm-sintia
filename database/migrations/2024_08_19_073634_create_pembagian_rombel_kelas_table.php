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
        Schema::create('pembagian_rombel_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rombongan_belajar_id')->constrained('rombongan_belajar')->cascade('onUpdate')->cascade('onDelete');
            $table->foreignId('kelas_id')->constrained('kelas')->cascade('onUpdate')->cascade('onDelete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembagian_rombel_kelas');
    }
};
