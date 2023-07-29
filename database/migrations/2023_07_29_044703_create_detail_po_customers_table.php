<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPoCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_po_customers', function (Blueprint $table) {
            $table->increments('id_detail_po_customers');
            $table->integer('id_po_customers');
            $table->integer('id_part_customer');
            $table->integer('qty_po_customer');
            $table->integer('harga_po_customer');
            $table->string('uom');
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
        Schema::dropIfExists('detail_po_customers');
    }
}
