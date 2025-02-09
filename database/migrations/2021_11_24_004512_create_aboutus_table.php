<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutus', function (Blueprint $table) {
            $table->id();
            $table->longText('description', 100);
            $table->string('address', 100);
            $table->string('email', 100);
            $table->string('phone', 100);
            $table->string('openH', 255);
            $table->string('thumb', 255);
            $table->string('map', 255);
            $table->string('linkYT', 255);
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
        Schema::dropIfExists('aboutus');
    }
}
