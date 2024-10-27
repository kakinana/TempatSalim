<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daftar_kembali', function (Blueprint $table) {
            $table->id("id_return");

            #fk id_rent
            $table->unsignedBigInteger('id_rent');
            $table->foreign('id_rent')->references('id_rent')->on('daftar_pinjam');
            
            $table->date('date_return');
            $table->boolean("returned")->default(0);
            $table->integer("penalty")->default(0);
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daftar_kembali');
    }
};
