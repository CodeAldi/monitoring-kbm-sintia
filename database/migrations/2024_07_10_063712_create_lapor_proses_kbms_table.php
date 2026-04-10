<?php

use App\Enums\StatusKbm;
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
            $table->dateTime('tanggal')->nullable();
            $table->integer('hadir')->default(0);
            $table->integer('sakit')->default(0);
            $table->integer('izin')->default(0);
            $table->integer('absent')->default(0);
            $table->enum('status',['has-not-started-yet','started','ongoing','finished'])->default('has-not-started-yet');
            $table->enum('pembukaan',['has-not-started-yet','started','ongoing','finished'])->default('has-not-started-yet');
            $table->enum('isi',['has-not-started-yet','started','ongoing','finished'])->default('has-not-started-yet');
            $table->enum('penutup',['has-not-started-yet','started','ongoing','finished'])->default('has-not-started-yet');
            $table->string('assesment')->nullable();
            $table->text('catatan')->nullable();
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
