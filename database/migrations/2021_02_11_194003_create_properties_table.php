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
            $table->text("address");
            $table->text("image_full");
            $table->text("image_thumbnail");
            $table->text("latitude");
            $table->text("longitude");
            $table->integer("num_bedrooms");
            $table->integer("num_bathrooms");
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
