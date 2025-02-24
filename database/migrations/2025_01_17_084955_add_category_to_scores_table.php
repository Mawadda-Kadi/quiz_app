<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $withinTransaction = false;

    public function up(): void
    {
        if (!Schema::hasColumn('scores', 'category')) {
            Schema::table('scores', function (Blueprint $table) {
                $table->string('category')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::table('scores', function (Blueprint $table) {
            if (Schema::hasColumn('scores', 'category')) {
                $table->dropColumn('category');
            }
        });
    }
};
