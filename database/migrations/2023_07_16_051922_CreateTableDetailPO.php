<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_po_suppliers', function (Blueprint $table) {
            $table->id('id_detail_po');
            $table->unsignedBigInteger('id_material');
            $table->unsignedBigInteger('id_po');
            $table->integer('qty_po');
            $table->string('uom', 50);
            $table->decimal('harga_po', 15, 2);
            $table->integer('qty_gr')->nullable();
            $table->decimal('harga_gr', 15, 2)->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_material')->references('id_part_supplier')->on('part_suppliers')->onDelete('cascade');
            $table->foreign('id_po')->references('id_po')->on('po_suppliers')->onDelete('cascade');

            // Indexes
            $table->index(['id_po', 'id_material']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_po_suppliers');
    }
};
