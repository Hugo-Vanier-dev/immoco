<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesShutterTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties_shutter_types', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();      
            $table->integer('property_id')->unsigned();
            $table->integer('shutter_type_id')->unsigned();
        });

        Schema::table('properties_shutter_types', function($table){
            $table->foreign('property_id')
            ->references('id')->on('properties')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('shutter_type_id')
            ->references('id')->on('shutter_types')
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
        Schema::dropIfExists('properties_property_types_');
    }
}
