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
        Schema::create('score_card_template_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('template_id');
            $table->string('field_name');
            $table->boolean('is_required');
            $table->enum('field_type', ['TEXT', 'TEXT_AREA', 'DROP_DOWN', 'CHECK_BOX', 'RADIO', 'NUMBER', 'STAR', 'TOGGLE']);
            $table->string('position');
            $table->longText('data')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('template_id')->references('id')->on('score_card_templates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score_card_template_fields');
    }
};
