<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomingCashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_cashes', function (Blueprint $table) {
            $table->increments('id_incoming_cashes');
            $table->integer('id_customer');
            $table->integer('id_bank');
            $table->string('top');
            $table->string('po_customer');
            $table->biginteger('amount_incoming');
            $table->date('tgl_incoming_cash');
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
        Schema::dropIfExists('incoming_cashes');
    }
}
