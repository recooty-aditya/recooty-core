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
        Schema::create('connected_calendars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('provider');
            $table->string('calendar_id');
            $table->string('title');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('timezone');
            $table->tinyInteger('is_primary');
            $table->string('refresh_token', 1000)->nullable(); // OAuth2
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connected_calendars');
    }
};
