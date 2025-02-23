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
        DB::statement('PRAGMA foreign_keys = OFF'); // Disable foreign key checks for SQLite

        // Check if the new table exists before creating it
        if (!Schema::hasTable('users_new')) {
            Schema::create('users_new', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique()->index();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });

            // Copy data safely
            DB::table('users_new')->insert(
                DB::table('users')->select('id', 'name', 'password', 'remember_token', 'created_at', 'updated_at')->get()->toArray()
            );
        }

        // Drop only if `users` exists
        if (Schema::hasTable('users')) {
            Schema::dropIfExists('users');
        }

        // Rename safely
        if (Schema::hasTable('users_new')) {
            Schema::rename('users_new', 'users');
        }

        DB::statement('PRAGMA foreign_keys = ON'); // Re-enable foreign key checks
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('PRAGMA foreign_keys = OFF'); // Disable foreign key checks

        if (!Schema::hasTable('users_old')) {
            Schema::create('users_old', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique()->index();
                $table->string('email')->nullable(); // Restore email
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });

            // Restore data
            DB::table('users_old')->insert(
                DB::table('users')->select('id', 'name', 'password', 'remember_token', 'created_at', 'updated_at')->get()->toArray()
            );
        }

        Schema::dropIfExists('users');
        Schema::rename('users_old', 'users');

        DB::statement('PRAGMA foreign_keys = ON'); // Re-enable foreign key checks
    }
};