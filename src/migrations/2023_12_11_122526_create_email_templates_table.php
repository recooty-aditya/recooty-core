<?php

use Database\Seeders\EmailSeeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('email_categories');
            $table->string('name');
            $table->string('subject');
            $table->longText('body');
            $table->boolean('is_default')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();  
            $table->unsignedBigInteger('team_id')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('last_updated_by')->references('id')->on('users')->nullable(); 
            $table->foreign('team_id')->references('id')->on('teams');
        });

        $seeder = new EmailSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_templates');
    }
};
