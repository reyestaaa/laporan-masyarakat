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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->unsignedBigInteger('id_kategori');
            $table->string('image')->nullable();
            $table->text('isi_berita');
            $table->unsignedBigInteger('id_petugas');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
