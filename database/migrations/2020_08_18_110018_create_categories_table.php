<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            // require
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            // content
            $table->text('text')->nullable();
            $table->string('image')->nullable();
            $table->integer('parent_id')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            // seo
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_h1')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
