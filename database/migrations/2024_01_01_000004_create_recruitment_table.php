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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jobPostingId'); // Foreign key for job postings
            $table->unsignedBigInteger('recruiterId'); // Foreign key for recruiters (users)
            $table->unsignedBigInteger('jobSeekerId'); // Foreign key for job seekers (users)
            $table->string('status'); // Recruitment status
            $table->timestamps();

            $table->foreign('jobPostingId')->references('id')->on('job_postings')->onDelete('cascade');
            $table->foreign('recruiterId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jobSeekerId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitments');
    }
};
