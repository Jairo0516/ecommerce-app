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
        Schema::create('foreigns_exchange', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->double('value');//VALOR QUE EQUIVALE A UN DOLAR VS LA DIVISA REGISTRADA
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreigns_exchange');
    }
};
