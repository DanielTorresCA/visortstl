<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('proyects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('status')->default('pending');
            $table->date(('deadline'))->nullable();
            $table->date(('completed_at'))->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('customer')->nullable();
            $table->integer('price')->nullable();
            $table->unsignedBigInteger('printTime');
            $table->integer('materialUsed');
            $table->boolean('isFail')->default(false);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('proyects');
    }
};
