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
        Schema::table('services', function (Blueprint $table) {
            $table->longText('service_notes')->nullable();
            $table->unsignedBigInteger('status')->nullable()->change();
            $table->longText('pictures')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('service_notes');
            $table->string('status')->nullable()->change();
            $table->dropColumn('pictures')->nullable();
        });
    }
};
