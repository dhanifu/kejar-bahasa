<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasssesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classses', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('category_id');
            // Jika data di category_classes dihapus, maka data classes nya pun ikut terhapus
            $table->foreign('category_id')->references('id')->on('category_classes')->onDelete('cascade');
            $table->string('name');
            $table->string('picture');
            $table->integer('price');
            $table->text('description');
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
        Schema::dropIfExists('classses');
    }
}
