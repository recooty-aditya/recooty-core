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
        Schema::create('score_card_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interview_id');
            $table->string('interview_interviewer_email_id');
            $table->unsignedBigInteger('score_card_field_id');
            $table->string('question');
            $table->longText('answer')->nullable();
            $table->enum('type', ['TEXT', 'TEXT_AREA', 'DROP_DOWN', 'CHECK_BOX', 'RADIO', 'NUMBER', 'STAR', 'TOGGLE'])->default('TEXT');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('interview_id')->references('id')->on('interviews');
            $table->foreign('score_card_field_id')->references('id')->on('score_card_template_fields');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score_card_responses');
    }
};
