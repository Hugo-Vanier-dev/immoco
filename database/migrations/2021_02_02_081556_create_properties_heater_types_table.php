<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesHeaterTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties_heater_types', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();       
            $table->bigInteger('property_id')->unsigned();
            $table->bigInteger('heater_type_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('properties_heater_types', function($table){
            $table->foreign('property_id')
            ->references('id')->on('properties')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('heater_type_id')
            ->references('id')->on('heater_types')
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
        Schema::dropIfExists('properties_heater_types');
    }
}
