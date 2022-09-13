<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('province_id')->unsigned()->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('text')->nullable();
            $table->string('price')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->tinyInteger('dont_show_email')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->string('reason_reject')->nullable();
            $table->timestamp('confirm_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('adver_categories')->nullOnDelete();
            $table->foreign('province_id')->references('id')->on('province_cities')->nullOnDelete();
            $table->foreign('city_id')->references('id')->on('province_cities')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
