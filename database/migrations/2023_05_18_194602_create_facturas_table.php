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
        Schema::create('facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('establecimiento');
            $table->string('punto_emision');
            $table->string('numero_factura');
            $table->date('fecha');
            $table->unsignedBigInteger('cliente_id');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total_iva', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
