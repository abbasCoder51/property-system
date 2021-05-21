<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->foreignId('county_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->foreignId('town_id')->constrained();
            $table->text('description');
            $table->string('full_details_url');
            $table->string('displayable_address');
            $table->string('image_url');
            $table->string('thumbnail_url');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('number_of_bedrooms');
            $table->integer('number_of_bathrooms');
            $table->integer('price');
            $table->foreignId('property_type_id')->constrained();
            $table->string('contract_type');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
