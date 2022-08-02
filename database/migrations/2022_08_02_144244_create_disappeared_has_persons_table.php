<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisappearedHasPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disappeared_has_persons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('disappeared_id');
            $table->unsignedBigInteger('people_id');
            $table->foreign('disappeared_id')->references('id')->on('disappeareds')->onDelete('cascade');
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
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
        Schema::dropIfExists('disappeared_has_persons');
    }
}
