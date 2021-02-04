<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('city', 100);
            $table->string('adress', 255);
            $table->text('description')->nullable();
            $table->dateTime('date');
            $table->integer('appointment_type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('appointments', function($table){

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDeleted('cascade')
            ->onUpdated('cascade');

            $table->foreign('appointment_type_id')
            ->references('id')->on('appointment_types')
            ->onDeleted('cascade')
            ->onUpdated('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
