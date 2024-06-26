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
        Schema::create('stores', function (Blueprint $table) {
            $table->tinyIncrements('store_id');
            $table->unsignedTinyInteger('manager_staff_id')->unique('idx_unique_manager');
            $table->unsignedSmallInteger('address_id')->index('idx_fk_address_id');
           // $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
