<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasemetalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basemetals', function (Blueprint $table) {
            $table->increments('id_base_metal');
            $table->string('kode_base_metal');
            $table->string('nama_base_metal');
            $table->integer('price_base_metal');
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
        Schema::dropIfExists('basemetals');
    }
}
