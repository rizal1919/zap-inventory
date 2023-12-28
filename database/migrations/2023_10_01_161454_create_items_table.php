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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('last_edited_by_id');
            $table->string('nama_barang');
            $table->string('toko')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->string('penerima')->nullable();
            $table->string('status')->nullable();
            $table->string('kode_logistik')->nullable();
            $table->string('nomor_seri')->nullable();
            $table->string('merk')->nullable();
            $table->string('tipe')->nullable();
            $table->bigInteger('watt')->nullable();
            $table->string('kapasitas')->nullable();
            $table->longText('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
