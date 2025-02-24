<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public $withinTransaction = false;

    public function up(): void
    {
        // For PostgreSQL, drop the foreign key constraint on scores before dropping users
        if (DB::connection()->getDriverName() === 'pgsql') {
            Schema::table('scores', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });
        }

        // Create a new temporary table without the email column
        if (!Schema::hasTable('users_new')) {
            Schema::create('users_new', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique()->index();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });

            // Copy data from the old users table (skipping the email column)
            DB::table('users_new')->insert(
                DB::table('users')
                    ->select('id', 'name', 'password', 'remember_token', 'created_at', 'updated_at')
                    ->get()
                    ->toArray()
            );
        }

        // Drop the old users table (the drop now succeeds because the dependent FK has been dropped)
        if (Schema::hasTable('users')) {
            Schema::dropIfExists('users');
        }

        // Rename users_new to users
        if (Schema::hasTable('users_new')) {
            Schema::rename('users_new', 'users');
        }

        // Re-add the foreign key constraint on scores to point to the new users table
        if (DB::connection()->getDriverName() === 'pgsql') {
            Schema::table('scores', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        // For PostgreSQL, drop the foreign key constraint on scores before modifying users
        if (DB::connection()->getDriverName() === 'pgsql') {
            Schema::table('scores', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });
        }

        // Recreate the old users table (with the email column) as users_old
        if (!Schema::hasTable('users_old')) {
            Schema::create('users_old', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique()->index();
                $table->string('email')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });

            // Restore data (note: email data will be null)
            DB::table('users_old')->insert(
                DB::table('users')
                    ->select('id', 'name', 'password', 'remember_token', 'created_at', 'updated_at')
                    ->get()
                    ->toArray()
            );
        }

        // Drop the current users table and rename users_old back to users
        Schema::dropIfExists('users');
        Schema::rename('users_old', 'users');

        // Re-add the foreign key constraint on scores for PostgreSQL
        if (DB::connection()->getDriverName() === 'pgsql') {
            Schema::table('scores', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
    }
};
