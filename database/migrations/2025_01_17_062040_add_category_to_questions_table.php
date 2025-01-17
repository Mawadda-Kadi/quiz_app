<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddCategoryToQuestionsTable extends Migration
{

    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            // Make the column nullable
            $table->string('category')->nullable()->after('question');
        });

    }

    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
}
