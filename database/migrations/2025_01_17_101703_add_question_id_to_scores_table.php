<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $withinTransaction = false;

    public function up(): void
    {
        if (!Schema::hasColumn('scores', 'question_id')) {
            Schema::table('scores', function (Blueprint $table) {
                $table->foreignId('question_id')
                    ->nullable()
                    ->constrained('questions')
                    ->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::table('scores', function (Blueprint $table) {
            if (Schema::hasColumn('scores', 'question_id')) {
                $table->dropForeign(['question_id']);
                $table->dropColumn('question_id');
            }
        });
    }
};
