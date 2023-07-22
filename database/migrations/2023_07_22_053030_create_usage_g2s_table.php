<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsageG2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usage_g2s', function (Blueprint $table) {
            $table->increments('id_usage_g2');
            $table->integer('id_material');
            $table->integer('qty_usage_g2');
            $table->date('tgl_usage_g2');
            $table->string('lot_usage_g2');
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
        Schema::dropIfExists('usage_g2s');
    }
}
