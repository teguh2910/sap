<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSjG1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sj_g1s', function (Blueprint $table) {
            $table->increments('id_sj_g1');
            $table->integer('id_gudang_satu');
            $table->integer('qty_sj_g1');
            $table->date('tgl_sj_g1');
            $table->integer('id_truk');
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
        Schema::dropIfExists('sj_g1s');
    }
}
