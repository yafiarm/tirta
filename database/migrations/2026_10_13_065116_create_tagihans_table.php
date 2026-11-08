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
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pencatatan_meter_id')->constrained('pencatatan_meters')->cascadeOnDelete();
            $table->foreignId('warga_id')->constrained('wargas')->cascadeOnDelete();
            $table->string('nomor_tagihan')->unique();
            $table->integer('total_tagihan');
            $table->enum('status_pembayaran', ['belum_bayar', 'lunas'])->default('belum_bayar');
            $table->date('tanggal_tenggat');
            $table->dateTime('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
