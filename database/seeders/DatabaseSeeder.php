<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public $withinTransaction = false;
    
    public function run()
    {
        if (DB::connection()->getDriverName() === 'sqlite') {
            // Disable foreign key checks for SQLite
            DB::statement('PRAGMA foreign_keys = OFF;');

            // Get all table names from SQLite, excluding system tables
            $tables = DB::select('SELECT name FROM sqlite_master WHERE type="table"');
            $tableNames = array_column($tables, 'name');

            foreach ($tableNames as $table) {
                // Skip the 'questions' table and the sqlite_sequence table
                if ($table !== 'questions' && $table !== 'sqlite_sequence') {
                    DB::table($table)->delete();
                }
            }

            // Re-enable foreign key checks for SQLite
            DB::statement('PRAGMA foreign_keys = ON;');
        } else {
            // For PostgreSQL (or other drivers), fetch table names from the public schema
            $tables = DB::select("SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname = 'public'");
            $tableNames = array_column($tables, 'tablename');

            foreach ($tableNames as $table) {
                // Skip the 'questions' table and 'migrations' table (if desired)
                if ($table !== 'questions' && $table !== 'migrations') {
                    DB::table($table)->delete();
                }
            }
        }

        $this->command->info('Database cleared, except for the questions table.');
    }
}
