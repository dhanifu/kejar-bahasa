<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('class_id');
            // Jika data di classes dihapus, maka data  module nya pun ikut terhapus
            $table->foreign('class_id')->references('id')->on('classses')->onDelete('cascade');
            $table->string('title');
            $table->longText('content')->default('Comming soon');
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
        Schema::dropIfExists('modules');
    }
}
