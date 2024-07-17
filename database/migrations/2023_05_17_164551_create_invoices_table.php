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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('uuid');
            $table->decimal('amount', 8, 2);
            $table->text('description');
            $table->string('brand');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->enum('status',['paid','unpaid'])->default('unpaid');
         
            $table->longText('payment_link')->nullable();
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
