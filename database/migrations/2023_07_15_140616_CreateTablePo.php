<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos', function (Blueprint $table) {
            $table->increments('id_po');
            $table->integer('id_vendor');
            $table->string('top');
            $table->integer('qty_po');
            $table->string('delivery_by');
            $table->date('delivery_date');
            $table->date('tgl_po');
            $table->string('quot_no');
            $table->string('pr_no');
            $table->integer('vat');
            $table->string('note_po')->nullable();
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
        Schema::dropIfExists('pos');
    }
}
