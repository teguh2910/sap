<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_customers', function (Blueprint $table) {
            $table->increments('id_po_customer');
            $table->string('no_po_customer');
            $table->string('id_customer');
            $table->string('id_produk');
            $table->string('qty_po_customer');
            $table->string('harga_po_customer');
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
        Schema::dropIfExists('po_customers');
    }
}
