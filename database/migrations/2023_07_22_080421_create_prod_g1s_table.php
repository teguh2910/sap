<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdG1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_g1s', function (Blueprint $table) {
            $table->increments('id_prod_g1');
            $table->integer('id_produk');
            $table->integer('qty_prod_g1');
            $table->date('tgl_prod_g1');
            $table->string('lot_prod_g1');
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
        Schema::dropIfExists('prod_g1s');
    }
}
