<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gedung', function (Blueprint $table) {
            $table->id("id_gd");
            $table->unsignedBigInteger("code_gd")->unique();
            $table->string('name_gd');
            $table->string('price_gd');
            $table->integer("stock_gd");
            $table->boolean('status_gd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('gedung');
    }
};