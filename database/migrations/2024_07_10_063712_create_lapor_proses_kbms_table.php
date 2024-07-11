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
        Schema::create('lapor_proses_kbm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_mengajar_id')->constrained('jadwal_mengajar')->cascade('onUpdate')->cascade('onDelete');
            $table->boolean('pembukaan');
            $table->boolean('isi');
            $table->boolean('penutup');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapor_proses_kbm');
    }
};
