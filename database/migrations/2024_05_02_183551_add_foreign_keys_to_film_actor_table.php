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
        Schema::table('film_actors', function (Blueprint $table) {
            $table->foreign(['actor_id'], 'fk_film_actor_actors')->references(['actor_id'])->on('actors')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['film_id'], 'fk_film_actor_films')->references(['film_id'])->on('films')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('film_actors', function (Blueprint $table) {
            $table->dropForeign('fk_film_actor_actors');
            $table->dropForeign('fk_film_actor_films');
        });
    }
};
