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
        Schema::create('aktas', function (Blueprint $table) {
            $table->bigIncrements('id_akta');
            $table->unsignedBigInteger('id_notaris');
            $table->string('nomor_akta');
            $table->string('jenis_akta');
            $table->date('tanggal_dibuat');
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('id_notaris')->references('id')->on('notarises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktas');
    }
};
