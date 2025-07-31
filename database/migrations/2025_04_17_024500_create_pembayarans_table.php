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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            // Menentukan secara eksplisit nama tabel yang menjadi referensi
            $table->foreignId('id_pemesanan')->constrained('pemesanans')->onDelete('cascade');
            $table->integer('jumlah');
            $table->string('status_pembayaran', 20)->nullable();
            $table->date('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
