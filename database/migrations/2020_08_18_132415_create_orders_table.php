<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            // require
            $table->bigIncrements('id');
            $table->tinyInteger('status')->default(0);
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('quantity')->default(1);
            $table->double('total')->default(0);
            // timestamps
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
        Schema::dropIfExists('orders');
    }
}
