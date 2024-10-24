<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gd_ct', function (Blueprint $table) {
            $table->unsignedBigInteger('code_gd');  // Foreign key to the gedung table
            $table->unsignedBigInteger('id_ct');  // Foreign key to the kategori table
        
            $table->foreign('code_gd')->references('code_gd')->on('gedung')->onDelete('cascade');
            $table->foreign('id_ct')->references('id_ct')->on('kategori')->onDelete('cascade');
            
            $table->primary(['code_gd', 'id_ct']);  // Composite primary key to avoid duplicate entries
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gd_ct');
    }
};
