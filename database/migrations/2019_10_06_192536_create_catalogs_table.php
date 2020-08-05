<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('catalogs', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('title');
      $table->integer('manufactured');
      $table->integer('mileage');
      $table->boolean('air_conditioning')->default('0');
      $table->boolean('leather_interior')->default('0');
      $table->boolean('alloy_wheels')->default('0');
      $table->boolean('xenon')->default('0');
      $table->boolean('parking_sensors')->default('0');
      $table->boolean('heated_seats')->default('0');
      $table->boolean('stabilization_control')->default('0');
      $table->boolean('navigation')->default('0');
      $table->boolean('speakerphone')->default('0');
      $table->text('short_description')->nullable();
      $table->text('description')->nullable();
      $table->decimal('price');
      $table->string('status')->default('not_published');
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
    Schema::dropIfExists('catalogs');
  }
}
