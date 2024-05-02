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
        Schema::table('rentals', function (Blueprint $table) {
            $table->foreign(['customer_id'], 'fk_rental_customers')->references(['customer_id'])->on('customers')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['inventory_id'], 'fk_rental_inventories')->references(['inventory_id'])->on('inventories')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['staff_id'], 'fk_rental_staffs')->references(['staff_id'])->on('staffs')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropForeign('fk_rental_customers');
            $table->dropForeign('fk_rental_inventories');
            $table->dropForeign('fk_rental_staffs');
        });
    }
};
