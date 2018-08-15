<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->float('area', 6, 2);
            $table->float('price', 8, 2);
            $table->string('photo')->nullable();
            $table->float('lng', 3, 7)->nullable();
            $table->float('lat', 3, 7)->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('postal')->nullable();
            $table->string('address');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
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
        Schema::drop('listings');
    }
}
