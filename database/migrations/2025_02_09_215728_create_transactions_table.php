<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 200);
            $table->string('phone', 15);
            $table->unsignedBigInteger('user_id');
            $table->text('content')->nullable();
            $table->integer('total_price');
            $table->integer('total_item');
            $table->string('payment_type', 255)->nullable();
            $table->timestamps();
            $table->string('status', 20)->nullable();
            $table->string('method', 100)->nullable();
            $table->string('time', 20);
            $table->string('day', 10);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
