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
        Schema::create('interview_interviewers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interview_id');
            $table->unsignedBigInteger('schedular_id');
            $table->unsignedBigInteger('team_id');
            $table->string('interviewer_email_id');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('interview_id')->references('id')->on('interviews');
            $table->foreign('schedular_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interview_interviewers');
    }
};
