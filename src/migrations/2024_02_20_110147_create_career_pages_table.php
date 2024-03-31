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
        Schema::create('career_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('banner')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('terms_and_condition')->nullable();
            $table->string('privacy_policy')->nullable();
            $table->string('gdpr_url')->nullable();
            $table->string('show_recooty_logo')->nullable();
            $table->string('show_share_button')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('theme')->nullable();
            $table->json('attribute')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_pages');
    }
};
