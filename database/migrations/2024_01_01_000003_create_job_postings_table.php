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
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('jobName');
            $table->json('jobDetails'); // JSON data for additional job information
            $table->longText('jobDesc'); // Job description
            $table->json('criteria'); // Criteria for applicants
            $table->json('requirement'); // Requirements for the job
            $table->unsignedBigInteger('recruiterId'); // Foreign key for recruiters (users)
            $table->timestamps();

            $table->foreign('recruiterId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};
