<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopularOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popular_organization', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150);
            $table->string('description',350);
            $table->string('url',150);
            $table->string('logo',150);
            $table->integer('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('popular_organization');
    }
}
