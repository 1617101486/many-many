<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailbeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailbeli', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_faktur');
            $table->foreign('id_faktur')->references('id')->on('faktur')->onDelete('CASCADE');
            $table->unsignedInteger('id_pembelian');
            $table->foreign('id_pembelian')->references('id')->on('pembelian')->onDelete('CASCADE');

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
        Schema::dropIfExists('detailbeli');
    }
}
