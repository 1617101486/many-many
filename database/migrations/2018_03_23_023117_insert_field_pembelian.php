<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertFieldPembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pembelian', function($table) {
            $table->unsignedInteger('id_barang')->after('tanggal')->nullable();
            $table->foreign('id_barang')->references('id')->on('barang')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('pembelian', function($table) {
            $table->dropColumn('id_barang');
        });
    }
}
