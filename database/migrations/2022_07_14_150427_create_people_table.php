<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gender_id');
            $table->string('dni',10);
            $table->string('names',50);
            $table->string('lastnames',50);
            $table->string('address');
            $table->string('phoneNumber');
            $table->string('status',1);
            //fk field on this table, fk field column on it db, fk db name
            $table->foreign('gender_id')->references('id')->on('genders');
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
        Schema::dropIfExists('people');
    }
}
