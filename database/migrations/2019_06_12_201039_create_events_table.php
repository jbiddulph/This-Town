<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('venue_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->date('event_startdate');
            $table->date('event_enddate');
            $table->time('event_starttime');
            $table->string('event_price');
            $table->integer('eventcategory_id');
            $table->string('type');
            $table->integer('status');
            $table->date('last_date');
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
        Schema::dropIfExists('events');
    }
}
