<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkmanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workmanagers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('staff_id')->unsigned();
            $table->integer('number_register');
            $table->integer('number_late');
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
        Schema::dropIfExists('workmanagers');
    }
}
