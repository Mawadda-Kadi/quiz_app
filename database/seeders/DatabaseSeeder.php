<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // /**
    //  * Seed the application's database.

    // *public function run(): void
    // *{
    //     // User::factory(10)->create();

    //     // Create a test user
    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);

    //     // Call the QuestionSeeder
    //     $this->call(QuestionSeeder::class);
    // } */

    public function run()
    {
        // Disable foreign key checks
        DB::statement('PRAGMA foreign_keys = OFF;');

        // Get all table names except 'questions'
        $tables = DB::select('SELECT name FROM sqlite_master WHERE type="table"');
        $tableNames = array_column($tables, 'name');

        foreach ($tableNames as $table) {
            // Skip the 'questions' table and system tables like sqlite_sequence
            if ($table !== 'questions') {
                DB::table($table)->delete();
            }
        }

        // Re-enable foreign key checks
        DB::statement('PRAGMA foreign_keys = ON;');

        $this->command->info('Database cleared, except for the questions table.');
    }
}

