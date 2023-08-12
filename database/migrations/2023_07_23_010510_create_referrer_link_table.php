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
        Schema::create('referrer_link', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referrer_id')->nullable();
            $table->foreign('referrer_id')->references('id')->on('users');
            $table->unsignedBigInteger('referred_id')->nullable();
            $table->foreign('referred_id')->references('id')->on('users');
            $table->string('code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrer_link');
    }
};
