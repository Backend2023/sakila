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
        Schema::create('actors', function (Blueprint $table) {
            $table->smallIncrements('actor_id');
            $table->string('first_name', 45);
            $table->string('last_name', 45)->index('idx_actor_last_name')->comment('prezime');
           // $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};
