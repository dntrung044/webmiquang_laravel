<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWardDnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ward_dn', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->charset('utf8')->collation('utf8_general_ci');
            $table->string('type', 30)->charset('utf8')->collation('utf8_general_ci');
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('district_dn')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ward_dn');
    }
}
