<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdG2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_g2s', function (Blueprint $table) {
            $table->increments('id_prod_g2');
            $table->integer('id_base_metal');
            $table->integer('qty_prod_g2');
            $table->date('tgl_prod_g2');
            $table->string('lot_prod_g2');
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
        Schema::dropIfExists('prod_g2s');
    }
}
