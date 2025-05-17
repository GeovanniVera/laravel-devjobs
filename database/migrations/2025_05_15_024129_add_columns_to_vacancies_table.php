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
            $table->string('title');
            $table->string('company');
            $table->date('last_day');
            $table->text('description');
            $table->string('image')->nullable();
            $table->integer('published')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('company');
            $table->dropColumn('last_day');
            $table->dropColumn('description');
            $table->dropColumn('image');
            $table->dropColumn('published');


        });
    }
};
