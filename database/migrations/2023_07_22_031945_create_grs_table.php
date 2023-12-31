<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grs', function (Blueprint $table) {
            $table->increments('id_gr');
            $table->integer('id_material');
            $table->integer('id_detail_po');
            $table->integer('qty_gr');
            $table->string('uom');
            $table->integer('harga_gr');
            $table->date('tgl_gr');
            $table->string('gudang');
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
        Schema::dropIfExists('grs');
    }
}
