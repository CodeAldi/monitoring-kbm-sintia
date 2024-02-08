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
        Schema::create('jadwal_piket_guru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('event_jadwal_piket_guru_id');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_piket_gurus');
    }
};
