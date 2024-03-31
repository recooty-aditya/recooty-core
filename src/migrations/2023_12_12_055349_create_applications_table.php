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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('resume');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('job_post_id');
            $table->unsignedBigInteger('round_id')->nullable();
            $table->enum('stage', ['NEW', 'SHORTLISTED', 'INTERVIEW', 'OFFERED', 'HIRED', 'REJECT'])->nullable();
            $table->enum('type', ['JOB_POST', 'TALENT_POOL'])->default('JOB_POST');
            $table->text('tags')->nullable();
            $table->json('viewer')->nullable();
            $table->unsignedBigInteger('job_board_id')->nullable();
            $table->json('resume_parse')->nullable();
            $table->json('semantic_match')->nullable();
            $table->integer('ai_score')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('job_post_id')->references('id')->on('job_posts');
            $table->foreign('job_board_id')->references('id')->on('job_boards');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('round_id')->references('id')->on('rounds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
