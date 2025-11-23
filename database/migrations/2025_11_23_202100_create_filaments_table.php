<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('filaments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('color');
            $table->string('type');
            $table->integer(('startWeight'));
            $table->integer('actualWeight');
            $table->string('brand');
            $table->integer('quantity');
    });
    }
    public function down(): void
    {
        Schema::dropIfExists('filaments');
    }
};
