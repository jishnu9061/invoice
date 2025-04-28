<?php

/**
 * Created By: JISHNU T K
 * Date: 2025/04/28
 * Time: 15:39:38
 * Description: 2025_04_28_100338_create_invoices_table.php
 */

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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->integer('quantity');
            $table->decimal('amount', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->decimal('tax_percentage', 5, 2);
            $table->decimal('tax_amount', 10, 2);
            $table->decimal('net_amount', 10, 2);
            $table->date('invoice_date');
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
