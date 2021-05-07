<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('mail')->unique()->nullable()->default(null);
            $table->string('cellphone')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('streetNumber')->nullable()->default(null);
            $table->string('zipCode')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('streetName')->nullable()->default(null);
            $table->date('birthdate')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->boolean('archive')->default(false);
            $table->bigInteger('client_type_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('clients', function($table){
            $table->foreign('client_type_id')
            ->references('id')->on('client_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('user_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('clients');
    }
}
