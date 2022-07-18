<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisappearedHasMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disappeared_has_medicamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('disappeared_id');
            $table->unsignedBigInteger('medicine_id');
            $table->foreign('disappeared_id')->references('id')->on('disappeareds');
            $table->foreign('medicine_id')->references('id')->on('medicines');
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
        Schema::dropIfExists('disappeared_has_medicamentos');
    }
}
