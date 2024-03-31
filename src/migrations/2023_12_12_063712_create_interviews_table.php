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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('schedular_id');
            $table->unsignedBigInteger('job_post_id');
            $table->unsignedBigInteger('application_id');
            $table->enum('status', ['SCHEDULED', 'ACCEPTED', 'DECLINED', 'COMPLETED'])->default('SCHEDULED');
            $table->string('stage')->nullable();
            $table->enum('type', ['WALK_IN', 'TELEPHONIC', 'VIDEO_CONFERENCING'])->default('WALK_IN');
            $table->unsignedBigInteger('score_card_template_id');
            $table->string('location')->nullable();
            $table->longText('candidate_notes')->nullable();
            $table->longText('interviewer_notes')->nullable();
            $table->string('start_time');
            $table->string('duration');
            $table->unsignedBigInteger('last_updated_by_user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('job_post_id')->references('id')->on('job_posts');
            $table->foreign('schedular_id')->references('id')->on('users');
            $table->foreign('score_card_template_id')->references('id')->on('score_card_templates');
            $table->foreign('last_updated_by_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
