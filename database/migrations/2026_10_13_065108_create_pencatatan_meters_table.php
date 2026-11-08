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
        Schema::create('pencatatan_meters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->cascadeOnDelete();
            $table->string('bulan_tahun'); // Format: YYYY-MM
            $table->integer('meter_awal');
            $table->integer('meter_akhir');
            $table->integer('total_pemakaian');
            $table->date('tanggal_catat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencatatan_meters');
    }
};
