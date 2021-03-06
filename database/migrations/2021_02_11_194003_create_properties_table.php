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
            $table->unsignedBigInteger("property_type_id");
            $table->string("property_uuid")->nullable();
            $table->string("county", 191);
            $table->string("country", 191);
            $table->string("town", 191);
            $table->text("description");
            $table->string("address", 191);
            $table->text("image_full")->nullable();
            $table->text("image_thumbnail")->nullable();
            $table->text("latitude")->nullable();
            $table->text("longitude")->nullable();
            $table->unsignedInteger("num_bedrooms");
            $table->unsignedInteger("num_bathrooms");
            $table->integer("price");
            $table->enum("type", ['rent', 'sale']);
            $table->timestamps();

            $table->foreign('property_type_id')->references('id')->on('property_types');
            $table->index(['address', 'price', 'num_bedrooms', 'type']);

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
