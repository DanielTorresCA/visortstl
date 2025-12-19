<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('print_jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('printer_id');
            $table->foreign('printer_id')->references('id')->on('printers')->onDelete('cascade');
            $table->unsignedBigInteger('filament_id');
            $table->foreign('filament_id')->references('id')->on('filaments')->onDelete('cascade');
            $table->unsignedBigInteger('proyect_id');
            $table->foreign('proyect_id')->references('id')->on('proyects')->onDelete('cascade');
            $table->integer('grams_used')->default(0);
            $table->decimal('hours', 8, 2)->default(0);
            $table->boolean('is_completed')->default(false);
            $table->timestamp('printed_at')->nullable();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('print_jobs');
    }
};
