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
        Schema::create('lesson_comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('lesson_id')->references('id')->on('lessons');
            $table->boolean('closed')->default(0);
            $table->foreignId('closed_user_id')->nullable()->references('id')->on('users');
            $table->foreignId('lesson_comment_id')->nullable()->references('id')->on('lesson_comments');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_comments');
    }
};
