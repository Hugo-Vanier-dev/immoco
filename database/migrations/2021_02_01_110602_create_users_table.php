<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('lastname', 50);
            $table->string('firstname', 50);
            $table->string('mail')->unique();
            $table->string('username', 50);
            $table->string('cellphone', 10)->nullable()->default(null);
            $table->string('phone', 10)->nullable()->default(null);
            $table->char('password', 60);
            $table->integer('user_type_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('users', function($table){
            $table->foreign('user_type_id')
            ->references('id')->on('user_types')
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
        Schema::dropIfExists('users');
    }
}
