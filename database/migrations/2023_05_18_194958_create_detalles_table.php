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
        Schema::create('detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('producto_id');
            $table->decimal('cantidad', 10, 2);
            $table->string('unidad_medida');
            $table->decimal('precio', 10, 2);
            $table->decimal('iva', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();

            $table->foreign('factura_id')->references('id')->on('facturas');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles');
    }
};
