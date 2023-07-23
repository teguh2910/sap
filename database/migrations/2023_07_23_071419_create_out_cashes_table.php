<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutCashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_cashes', function (Blueprint $table) {
            $table->increments('id_out_cashes');
            $table->integer('id_vendor');
            $table->integer('id_bank');
            $table->string('id_po');
            $table->string('category');
            $table->biginteger('amount_out');
            $table->date('tgl_out_cash');
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
        Schema::dropIfExists('out_cashes');
    }
}
