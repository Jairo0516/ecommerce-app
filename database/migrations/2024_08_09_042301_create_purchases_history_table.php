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
        Schema::create('purchases_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(false)->index();//RELACIÓN A DIVISA SELECCIONADA
            $table->foreignId('foreign_exchange_id')->nullable(false)->index();//RELACIÓN A DIVISA SELECCIONADA
            $table->foreignId('product_id')->nullable(false)->index();//RELACIÓN A PRODUCTO SELECCIOADO
            $table->integer('quantity');
            $table->double('product_value');//SE ALMACENA, PARA GARANTIZAR LA INTEGRIDAD DE LOS DATOS
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('foreign_exchange_id')->references('id')->on('foreigns_exchange');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases_histories');
    }
};
