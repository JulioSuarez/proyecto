<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('expression');
            $table->text('route_path'); //url video d-id
            $table->integer('sort');
            $table->tinyInteger('gender'); //0 mujer 1 hombre
            $table->unsignedBigInteger('avatar_id');
            $table->foreign('avatar_id')->references('id')->on('avatars');
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')->references('id')->on('programs');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
