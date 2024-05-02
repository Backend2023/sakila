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
        Schema::table('film_categories', function (Blueprint $table) {
            $table->foreign(['category_id'], 'fk_film_category_category')->references(['category_id'])->on('categories')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['film_id'], 'fk_film_category_film')->references(['film_id'])->on('films')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('film_categories', function (Blueprint $table) {
            $table->dropForeign('fk_film_category_category');
            $table->dropForeign('fk_film_category_film');
        });
    }
};
