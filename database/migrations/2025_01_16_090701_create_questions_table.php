<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * The questions table stores quiz questions, their options, and the correct answer.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id(); // Adds an auto-incrementing "primary key" column (id).
            $table->string('question'); // Adds a column for the question text.
            $table->json('options'); // Adds a column to store a JSON array of answer options.
            $table->string('correct_option'); // Adds a column to store the correct answer (as a string or index).
            $table->timestamps(); // Adds two columns: `created_at` and `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
