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
        Schema::create('rounds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("team_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("pipeline_id");
            $table->string("name");
            $table->enum("stage",["NEW","SHORTLISTED","INTERVIEW","OFFERED","HIRED","REJECT"])->default("NEW");
            $table->integer("sequence");
            $table->unsignedBigInteger("updated_by")->nullable();
            $table->unsignedBigInteger("score_card_template_id")->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('pipeline_id')->references('id')->on('pipelines');
            $table->foreign('score_card_template_id')->references('id')->on('score_card_templates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rounds');
    }
};
