<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoks', function (Blueprint $table) {
            $table->increments('id_stok');
            $table->string('part_no');
            $table->string('part_name');
            $table->string('category_part');
            $table->integer('beginning_balance');
            $table->integer('incoming_balance')->nullable();
            $table->integer('usage_balance')->nullable();
            $table->integer('ending_balance')->nullable();
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
        Schema::dropIfExists('stoks');
    }
}
