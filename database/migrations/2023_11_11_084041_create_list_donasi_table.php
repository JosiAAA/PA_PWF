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
        Schema::create('list_donasi', function (Blueprint $table) {
            $table->increments("id");
            $table->text("judul");
            $table->string("pemilik");
            $table->string("role_pemilik");
            $table->text("link_gambar");
            $table->string("tanggal");
            $table->string("jam");
            $table->integer("jumlah_pendonasi")->default(0);
            $table->integer("total_terkumpul")->default(0);
            $table->text("deskripsi");
            $table->string("wilayah");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_donasi');
    }
};
