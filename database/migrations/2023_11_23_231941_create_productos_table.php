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
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('_id');
            $table->string('name')->nullable();
            $table->string('brand')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('minimum_amount')->nullable();
            $table->integer('price')->nullable();
            $table->string('unit')->nullable();
            $table->integer('categoryId')->nullable();
            $table->integer('supplierId')->nullable();
            $table->integer('__v')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
