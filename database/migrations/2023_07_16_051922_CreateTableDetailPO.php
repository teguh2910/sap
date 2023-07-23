<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetailPO extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pos', function (Blueprint $table) {
            $table->increments('id_detail_po');
            $table->integer('id_material');
            $table->integer('id_po');
            $table->integer('qty_po');
            $table->integer('qty_gr');
            $table->string('uom');
            $table->integer('harga_po');
            $table->integer('harga_gr');
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
        Schema::dropIfExists('detail_pos');
    }
}
