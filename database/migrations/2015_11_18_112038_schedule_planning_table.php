<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SchedulePlanningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning', function (Blueprint $table) {
            $table->increments('planning_id');
            $table->date('date');
            $table->integer('day')->default(0);
            $table->integer('unavailable')->default(0);
            $table->decimal('from');
            $table->integer('break');
            $table->decimal('untill');
            $table->integer('user_id');
            $table->integer('division_id');
            $table->integer('status')->default(0);
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
        Schema::drop('planning');
    }
}
