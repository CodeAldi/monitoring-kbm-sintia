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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nomor_induk')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'wakil kurikulum', 'guru mapel', 'guru piket', 'siswa'])->default('siswa');
            // Admin => 'admin', WakilKurikulum => 'wakil kurikulum', GuruMapel => 'guru mapel', GuruPiket => 'guru piket', Siswa => 'siswa',
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
