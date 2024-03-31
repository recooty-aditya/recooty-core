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
        Schema::create('screening_question_template_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('template_field_id');
            $table->string('question');
            $table->longText('answer')->nullable();
            $table->enum('type', ['FILE', 'TEXT', 'IMAGE'])->default('TEXT');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('template_field_id')->references('id')->on('screening_question_template_fields');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screening_question_template_responses');
    }
};
