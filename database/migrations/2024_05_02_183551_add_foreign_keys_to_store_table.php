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
        Schema::table('stores', function (Blueprint $table) {
            $table->foreign(['address_id'], 'fk_store_address')->references(['address_id'])->on('addresses')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['manager_staff_id'], 'fk_store_staff')->references(['staff_id'])->on('staffs')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropForeign('fk_store_address');
            $table->dropForeign('fk_store_staff');
        });
    }
};
