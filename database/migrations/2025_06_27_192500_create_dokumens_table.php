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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->bigIncrements('id_dokumen');
            $table->unsignedBigInteger('id_akta');
            $table->string('nama_file');
            $table->string('tipe_file');
            $table->string('path_file');
            $table->date('tanggal_upload');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('id_akta')->references('id_akta')->on('aktas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
