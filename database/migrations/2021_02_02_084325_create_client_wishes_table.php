<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientWishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_wishes', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->integer('price');
            $table->float('longitude')->nullable()->default(null);
            $table->float('latitude')->nullable()->default(null);
            $table->integer('livingArea')->nullable()->default(null);
            $table->integer('area')->nullable()->default(null);
            $table->integer('gardenArea')->nullable()->default(null);
            $table->integer('floorNumber')->nullable()->default(null);
            $table->integer('piecesNumber')->nullable()->default(null);
            $table->integer('bedroomNumber')->nullable()->default(null);
            $table->integer('bathroomNumber')->nullable()->default(null);
            $table->integer('wcNumber')->nullable()->default(null);
            $table->boolean('garden')->default(false);
            $table->boolean('garage')->default(false);
            $table->boolean('cellar')->default(false);
            $table->boolean('atic')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('opticalFiber')->default(false);
            $table->boolean('swimmingPool')->default(false);
            $table->boolean('balcony')->default(false);
            $table->bigInteger('client_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('client_wishes', function($table){

            $table->foreign('client_id')
            ->references('id')->on('clients')
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
        Schema::dropIfExists('client_wishes');
    }
}
