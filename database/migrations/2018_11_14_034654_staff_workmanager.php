<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StaffWorkmanager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workmanagers', function (Blueprint $table) {
            $table->foreign('staffId')->references('id')->on('staffs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workmanagers', function (Blueprint $table) {
            $table->dropForeign('workmanagers_staffId_foreign');
        });

    }
}