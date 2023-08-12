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
        Schema::table('users', function (Blueprint $table) {
           $table->decimal("ten_wallet_balance", 16, 2)->default(0);
           $table->decimal("tweenty_wallet_balance", 16, 2)->default(0);
           $table->decimal("fifty_wallet_balance", 16, 2)->default(0);
           $table->decimal("hundred_wallet_balance", 16, 2)->default(0);
           $table->decimal("two_hendred_wallet_balance", 16, 2)->default(0);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("ten_wallet_balance");
            $table->dropColumn("tweenty_wallet_balance");
            $table->dropColumn("fifty_wallet_balance");
            $table->dropColumn("hundred_wallet_balance");
            $table->dropColumn("two_hendred_wallet_balance");
        });
    }
};
