<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Serviice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviice', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->string('adress');
            $table->unsignedBigInteger('id_user')->unsigned();
            $table->text('description');
            $table->string('typename');
            $table->string('image');
            $table->string('image360')->nullable();
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
        Schema::dropIfExists('serviice');

    }
}
