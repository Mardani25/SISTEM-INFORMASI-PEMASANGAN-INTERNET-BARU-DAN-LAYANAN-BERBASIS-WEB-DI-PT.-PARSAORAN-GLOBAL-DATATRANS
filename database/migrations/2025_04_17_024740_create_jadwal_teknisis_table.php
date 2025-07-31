<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_teknisis', function (Blueprint $table) {
            $table->id();

            // Ubah: teknisi sekarang langsung user
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
            $table->foreignId('id_pemesanan')->constrained('pemesanans')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('waktu');
            $table->enum('status_kehadiran', ['belum_hadir', 'hadir'])->default('belum_hadir');
            $table->string('bukti_foto')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::table('jadwal_teknisis', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropColumn('id_user');
        });
    }
};
