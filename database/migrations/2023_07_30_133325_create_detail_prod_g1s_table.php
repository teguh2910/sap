<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailProdG1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_prod_g1s', function (Blueprint $table) {
            $table->increments('id_detail_prod_g1');
            $table->integer('id_prod_g1');
            $table->integer('id_gudang_satu');
            $table->integer('price_g1')->nullable();
            $table->integer('qty_prod_g1')->nullable();
            $table->string('category_part')->nullable();
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
        Schema::dropIfExists('detail_prod_g1s');
    }
}
