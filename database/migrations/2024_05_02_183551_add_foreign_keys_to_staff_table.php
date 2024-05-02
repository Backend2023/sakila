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
        Schema::table('staffs', function (Blueprint $table) {
            $table->foreign(['address_id'], 'fk_staff_addresses')->references(['address_id'])->on('addresses')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['store_id'], 'fk_staff_stores')->references(['store_id'])->on('stores')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staffs', function (Blueprint $table) {
            $table->dropForeign('fk_staff_addresses');
            $table->dropForeign('fk_staff_stores');
        });
    }
};
