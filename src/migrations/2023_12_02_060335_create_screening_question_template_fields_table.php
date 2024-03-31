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
        Schema::create('screening_question_template_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('template_id');
            $table->string('field_name');
            $table->boolean('is_required');
            $table->enum('field_type', ['TEXT', 'TEXT_AREA', 'DROP_DOWN', 'CHECK_BOX', 'RADIO', 'FILE', 'NUMBER', 'DATE', 'TOGGLE']);
            $table->string('position');
            $table->longText('data')->nullable();
            $table->enum('data_type', ['TEXT', 'FILE'])->nullable();
            $table->enum('visibility', ['RECRUITER', 'CANDIDATE', 'BOTH'])->default('BOTH');
            $table->boolean('auto_reject')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('template_id')->references('id')->on('screening_question_templates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screening_question_template_fields');
    }
};
