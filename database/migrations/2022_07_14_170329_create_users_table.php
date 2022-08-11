<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('rol_id');
            $table->string('username',10)->unique();
            $table->string('email',50)->unique();
            $table->string('password',255);
            $table->string('status',1);
            $table->rememberToken();
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('rol_id')->references('id')->on('rols')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
