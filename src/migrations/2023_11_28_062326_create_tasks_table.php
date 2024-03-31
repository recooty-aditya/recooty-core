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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("user_id");
            $table->text("description");
            $table->unsignedBigInteger("assign_to");
            $table->unsignedBigInteger("team_id");
            $table->enum("type",['INTERVIEW','MEETING','REVIEW','OTHER'])->default("OTHER");
            $table->enum("status",["OPEN","PENDING","IN_PROGRESS","COMPLETED"])->default("OPEN");
            $table->enum("priority",["CRITICAL","HIGH","MEDIUM","LOW"])->default("LOW");
            $table->enum("visibility",["TEAM","ASSIGNED"])->default("TEAM");
            $table->dateTime("due_date")->nullable();
            $table->json("data")->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('assign_to')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
