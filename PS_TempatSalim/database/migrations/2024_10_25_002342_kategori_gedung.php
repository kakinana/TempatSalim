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
        Schema::create('kategori_gedung', function (Blueprint $table) {
            $table->unsignedBigInteger('id_gd');
            $table->unsignedBigInteger('id_ct');

            $table->foreign('id_gd')->references('id')->on('gedung')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ct')->references('id')->on('kategori')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['id_gd', 'id_ct']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_gedung');
    }
};
