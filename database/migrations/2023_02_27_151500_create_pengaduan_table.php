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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->dateTime('tgl_pengaduan');
            $table->char('nik', 16);
            $table->string('judul', 255);
            $table->unsignedBigInteger('id_kategori');
            $table->text('lokasi');
            $table->text('isi_laporan');
            $table->string('foto');
            $table->enum('status', ['0','proses','selesai',]);
            $table->timestamps();
            $table->foreign('nik')->references('nik')->on('masyarakats');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
