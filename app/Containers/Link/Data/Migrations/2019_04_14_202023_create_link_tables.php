<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLinkTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(
            'links', function (Blueprint $table) {

                $table->increments('id');

                $table->string('url');
                $table->string('uid', 50);

                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('links');
    }
}
