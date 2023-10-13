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
        Schema::create('user_course_class_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_course_id')->references('id')->on('user_courses');
            $table->foreignId('class_id')->references('id')->on('classes');
            $table->boolean('finished')->default(0);
            $table->timestamp('finished_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_course_class_progress');
    }
};
