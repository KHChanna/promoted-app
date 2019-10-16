<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('cat_id');
            $table->string('advertise_name');
            $table->integer('quantity');
            $table->decimal('unit_price');
            $table->decimal('discount');
            $table->string('image');
            $table->text('advertise_address');
            $table->integer('advertise_avaliable');
            $table->text('advertise_description');
            $table->boolean('advertise_status');
            $table->boolean('is_active');
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
        Schema::dropIfExists('advertises');
    }
}
