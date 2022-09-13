<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdverCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adver_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('sort_id')->default(0);
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('adver_categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adver_categories');
    }
}
