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
        Schema::create('payment_screen_short', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedBigInteger('receiver_id')->nullable();
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->unsignedBigInteger('donor_id')->nullable();
            $table->foreign('donor_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_screen_short');
    }
};
