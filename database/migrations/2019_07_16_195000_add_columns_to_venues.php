<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToVenues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->string('address2')->nullable()->after('address');
            $table->string('address3')->nullable();
            $table->string('region')->nullable()->after('postcode');
            $table->string('premisestype')->nullable()->after('region');
            $table->string('industry')->nullable()->after('premisestype');
            $table->string('title')->nullable()->after('cover_photo');
            $table->string('forename')->nullable()->after('title');
            $table->string('surname')->nullable()->after('forename');
            $table->string('position')->nullable()->after('surname');
            $table->string('email')->nullable()->after('position');
            $table->string('postalsearch')->nullable()->after('email');
            $table->string('offer')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('venues', function (Blueprint $table) {
            //
        });
    }
}
