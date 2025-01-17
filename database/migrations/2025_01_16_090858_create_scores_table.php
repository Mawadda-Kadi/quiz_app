<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * The scores table tracks user quiz scores and links them to users via a foreign key
     */
    public function up(): void
    {
        if (!Schema::hasTable('scores')) {
            Schema::create('scores', function (Blueprint $table) {
                $table->id(); // Adds an auto-incrementing primary key column (id)
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                // Foreign key linking to the users table.
                // ->constrained() automatically sets up the foreign key relationship.
                // ->onDelete('cascade') ensures that if a user is deleted, their related scores will also be deleted.
                $table->integer('score'); // User's score
                $table->timestamps(); // Record when the quiz was taken
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
