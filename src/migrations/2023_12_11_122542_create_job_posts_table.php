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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('team_id');
            $table->string('title');
            $table->enum('type', ['JOB_POST', 'TALENT_POOL'])->default('JOB_POST');
            $table->longText('description')->nullable();
            $table->string('code')->nullable();
            $table->string('slug')->nullable();
            $table->enum('experience_required', ['INTERNSHIP', 'ENTRY_LEVEL', 'ASSOCIATE', 'MID_SENIOR', 'VICE_PRESIDENT', 'PRESIDENT'])->nullable();
            $table->enum('location_type', ['ON_SITE', 'HYBRID', 'REMOTE'])->nullable();
            $table->enum('status', ['DRAFT', 'OPEN', 'INTERNAL', 'CLOSED'])->nullable();
            $table->enum('job_board_status', ['PENDING_APPROVAL', 'APPROVED', 'REJECTED', 'NOT_APPLIED'])->nullable();
            $table->enum('employment_type', ['FULL_TIME', 'PART_TIME', 'INTERN', 'CONTRACTOR', 'OTHER'])->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('pipeline_id')->nullable();
            $table->unsignedBigInteger('screening_question_template_id')->nullable();
            $table->decimal('min_pay', 20, 2)->nullable();
            $table->decimal('max_pay', 20, 2)->nullable();
            $table->enum('pay_interval', ['HOUR', 'DAY', 'WEEK', 'MONTH', 'YEAR'])->nullable();
            $table->string('pay_currency')->nullable();
            $table->string('short_url')->nullable();
            $table->boolean('flag')->default(false);
            $table->string('flag_reason')->nullable();
            $table->unsignedBigInteger('last_updated_by_user_id')->nullable();
            $table->json('jd_parse')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('pipeline_id')->references('id')->on('pipelines');
            $table->foreign('screening_question_template_id')->references('id')->on('screening_question_templates');
            $table->foreign('last_updated_by_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
