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
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->integer('price');
            $table->string('label');
            $table->text('description');
            $table->float('longitude');
            $table->float('latitude');
            $table->string('city', 100);
            $table->string('adress', 255);
            $table->string('zipcode', 5);
            $table->integer('livingArea');
            $table->integer('area');
            $table->integer('gardenArea')->nullable()->default(null);
            $table->integer('floorNumber')->nullable()->default(null);
            $table->integer('piecesNumber')->nullable()->default(null);
            $table->integer('bedroomNumber')->nullable()->default(null);
            $table->integer('bathroomNumber')->nullable()->default(null);
            $table->integer('wcNumber')->nullable()->default(null);
            $table->string('buildingNumber', 25)->nullable()->default(null);
            $table->integer('bearing')->nullable()->default(null);
            $table->string('doorNumber', 25)->nullable()->default(null);
            $table->boolean('garden')->default(false);
            $table->boolean('garage')->default(false);
            $table->boolean('cellar')->default(false);
            $table->boolean('atic')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('opticalFiber')->default(false);
            $table->boolean('swimmingPool')->default(false);
            $table->boolean('balcony')->default(false);
            $table->boolean('archive')->default(false);
            $table->integer('client_id')->unsigned();
            $table->integer('property_type_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('properties', function($table){
            $table->foreign('property_type_id')
            ->references('id')->on('property_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
