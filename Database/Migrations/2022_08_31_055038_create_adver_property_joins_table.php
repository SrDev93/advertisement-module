<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdverPropertyJoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adver_property_joins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('adver_id')->unsigned();
            $table->bigInteger('property_id')->unsigned();
            $table->string('value')->nullable();
            $table->timestamps();

            $table->foreign('adver_id')->references('id')->on('advertisements')->cascadeOnDelete();
            $table->foreign('property_id')->references('id')->on('adver_properties')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adver_property_joins');
    }
}
