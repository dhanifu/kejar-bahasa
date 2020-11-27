<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // Jika data di users dihapus, maka data purchaseds nya pun ikut terhapus
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('class_id');
            // Jika data di classes dihapus, maka purchaseds nya pun ikut terhapus
            $table->foreign('class_id')->references('id')->on('classses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchaseds');
    }
}
