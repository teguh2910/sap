<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailProdG2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_prod_g2s', function (Blueprint $table) {
            $table->increments('id_detail_prod_g2');
            $table->integer('id_prod_g2');
            $table->integer('id_gudang_dua');
            $table->integer('price_g2')->nullable();
            $table->integer('qty_prod_g2')->nullable();
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
        Schema::dropIfExists('detail_prod_g2s');
    }
}
