<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('layanan_tte', function (Blueprint $table) {
            $table->id();
            $table->string('ktp', 50);
            $table->string('nama_lengkap', 255);
            $table->string('nik', 50);
            $table->string('nip', 50);
            $table->string('jabatan', 255);
            $table->string('no_hp', 50);
            $table->string('unit_kerja', 255);
            $table->date('tanggal_permohonan');
            $table->time('waktu_permohonan');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('perangkat_daerah_id');
            $table->unsignedBigInteger('status_permohonan_id');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->foreign('perangkat_daerah_id')->references('id')->on('perangkat_daerah');
            $table->foreign('status_permohonan_id')->references('id')->on('status_permohonan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_t_t_e');
    }
};
