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
        Schema::create('kategori', function (Blueprint $table) {
            $table->unsignedBigInteger("id_ct")->unique();
            $table->string('name_ct');

            #fk id_gd
            $table->unsignedBigInteger('code_gd');
            $table->foreign('code_gd')->references('code_gd')->on('gedung');

            $table->boolean("status_ct")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
};
