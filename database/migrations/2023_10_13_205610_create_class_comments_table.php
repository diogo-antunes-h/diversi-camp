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
        Schema::create('class_comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('class_id')->references('id')->on('classes');
            $table->boolean('closed')->default(0);
            $table->foreignId('closed_user_id')->nullable()->references('id')->on('users');
            $table->foreignId('comment_id')->nullable()->references('id')->on('class_comments');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_comments');
    }
};
