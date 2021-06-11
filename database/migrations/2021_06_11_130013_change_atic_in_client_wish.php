<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAticInClientWish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_wishes', function (Blueprint $table) {
            $table->renameColumn('atic', 'attic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_wishes', function (Blueprint $table) {
            $table->renameColumn('attic', 'atic');
        });
    }
}
