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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('last_edited_by_id')->nullable();
            $table->string('service_id')->unique();
            $table->string('service_by')->nullable();
            $table->string('nama_kerusakan')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('nomor_seri')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('tanggal_kerusakan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
