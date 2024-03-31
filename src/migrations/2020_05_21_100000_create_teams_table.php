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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('name');
            $table->string('slug');
            $table->string('website');
            $table->string('domain')->unique();
            $table->string('legal_name')->nullable();
            $table->string('linked_in_url')->nullable();
            $table->string('industry')->nullable();
            $table->string('size')->nullable();
            $table->string('phone')->nullable();
            $table->string('headquarter_address')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('personal_team');   
            $table->text('api_key')->nullable();   
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
