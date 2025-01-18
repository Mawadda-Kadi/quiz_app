<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create a new table without the `email` column
        Schema::create('users_new', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Copy data from the old table to the new table
        DB::statement('INSERT INTO users_new (id, name, password, remember_token, created_at, updated_at) SELECT id, name, password, remember_token, created_at, updated_at FROM users');

        // Drop the old table
        Schema::drop('users');

        // Rename the new table to `users`
        Schema::rename('users_new', 'users');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('users_old', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->string('email')->nullable(); // Restore the email column
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Copy data back from the modified table
        DB::statement('INSERT INTO users_old (id, name, password, remember_token, created_at, updated_at) SELECT id, name, password, remember_token, created_at, updated_at FROM users');

        Schema::drop('users');
        Schema::rename('users_old', 'users');
    }
};