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
        Schema::create('stlfile', function (Blueprint $table) {
            $table->id(); // This creates an unsignedBigInteger
            $table->string('fileName');
            $table->string('filePath');
            $table->unsignedBigInteger('category_id');
            $table->boolean('isActive')->default(true);
            $table->timestamps();
             $table->foreign('category_id')->references('id')->on('categories');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('stlfile');
    }
};
