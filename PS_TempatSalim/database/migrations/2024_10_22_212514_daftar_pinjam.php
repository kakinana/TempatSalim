<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('daftar_pinjam', function (Blueprint $table) {
            $table->id("id_rent");

            #fk id_user
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onUpdate('cascade')->onDelete('cascade');

            #fk code_gd
            $table->unsignedBigInteger('id_gd');
            $table->foreign('id_gd')->references('id')->on('gedung')->onUpdate('cascade')->onDelete('cascade');

            $table->integer("unit_rent");
            $table->date("date_rent");
            $table->date("date_due");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daftar_pinjam');
    }
};
