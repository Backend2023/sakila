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
        Schema::table('payments', function (Blueprint $table) {
            $table->foreign(['customer_id'], 'fk_payment_customer')->references(['customer_id'])->on('customers')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['rental_id'], 'fk_payment_rental')->references(['rental_id'])->on('rentals')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['staff_id'], 'fk_payment_staff')->references(['staff_id'])->on('staffs')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign('fk_payment_customer');
            $table->dropForeign('fk_payment_rental');
            $table->dropForeign('fk_payment_staff');
        });
    }
};
