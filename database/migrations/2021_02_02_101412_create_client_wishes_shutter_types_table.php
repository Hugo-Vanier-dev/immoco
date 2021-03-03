<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientWishesShutterTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_wishes_shutter_types', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->bigInteger('client_wish_id')->unsigned();
            $table->bigInteger('shutter_type_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('client_wishes_shutter_types', function($table){
            $table->foreign('client_wish_id')
            ->references('id')->on('client_wishes')
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
        Schema::dropIfExists('client_wishes_shutter_types');
    }
}
