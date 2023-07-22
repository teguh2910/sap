<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsageG1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usage_g1s', function (Blueprint $table) {
            $table->increments('id_usage_g1');
            $table->integer('id_base_metal');
            $table->integer('qty_usage_g1');
            $table->date('tgl_usage_g1');
            $table->string('lot_usage_g1');
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
        Schema::dropIfExists('usage_g1s');
    }
}
