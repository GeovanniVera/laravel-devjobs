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
        Schema::table('vacancies', function (Blueprint $table) {
            $table->foreignId('salary_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->dropColumn('salary_id');
            $table->dropForeign('vacancies_salary_id_foreign');
        });
    }
};
