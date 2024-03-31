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
        Schema::create('job_widgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->enum('widget_type',['LIST','BLOCK'])->default('LIST');
            $table->enum('font_size',['SMALL','NORMAL','LARGE'])->default('NORMAL');
            $table->string('background_color')->nullable();
            $table->string('background_highlighter')->nullable();
            $table->string('text_color')->nullable();
            $table->string('text_link_color')->nullable();
            $table->string('primary_button')->nullable();
            $table->string('secondary_button')->nullable();
            $table->boolean('show_recooty_logo')->nullable();
            $table->boolean('allow_without_opening')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_widgets');
    }
};
