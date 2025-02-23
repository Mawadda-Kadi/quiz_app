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
        if (!Schema::hasColumn('scores', 'question_id')) {
            Schema::table('scores', function (Blueprint $table) {
                $table->foreignId('question_id')
                ->nullable()
                    ->constrained('questions') // Ensures it references the `questions` table
                    ->onDelete('cascade'); // Deletes scores if a related question is deleted
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scores', function (Blueprint $table) {
            if (Schema::hasColumn('scores', 'question_id')) {
                $table->dropForeign(['question_id']); // Drop foreign key constraint
                $table->dropColumn('question_id'); // Remove the column
            }
        });
    }
};
