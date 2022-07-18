<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisappearedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disappeareds', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('image');
            $table->string('identifier');
            $table->unsignedBigInteger('classification_id');
            $table->string('status',1);
            $table->foreign('classification_id')->references('id')->on('classifications');
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
        Schema::dropIfExists('disappeareds');
    }
}
