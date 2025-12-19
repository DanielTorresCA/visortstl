<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('print_jobfails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('print_job_id');
            $table->foreign('print_job_id')->references('id')->on('print_jobs')->onDelete('cascade');

            $table->string('reason');
            $table->integer('grams_lost');
            $table->decimal('hours_lost', 8, 2);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('print_jobfails');
    }
};
