<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertFieldFaktur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('faktur', function($table) {
            $table->unsignedInteger('id_kasir')->after('tanggal')->nullable();
            $table->foreign('id_kasir')->references('id')->on('kasir')->onDelete('CASCADE');
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
        Schema::table('faktur', function($table) {
            $table->dropColumn('id_ksir');
        });
    }
}
