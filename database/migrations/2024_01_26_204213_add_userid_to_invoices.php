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
        Schema::table('invoices', function (Blueprint $table) {
           $table->unsignedBigInteger('user_id');
           $table->unsignedBigInteger('owner_user_id')->nullable();
           $table->unsignedBigInteger('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('customer_id');
            $table->dropColumn('owner_user_id');
        });
    }
};
