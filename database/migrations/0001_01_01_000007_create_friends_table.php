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
        Schema::create('friend_request', function (Blueprint $table) {
            $table->id('request_id');
            $table->foreignId('user_sender_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_receiver_id')->constrained('users')->cascadeOnDelete();
            $table->enum('state', ['pending', 'accepted', 'denied'])->default('pending');
            $table->datetime('request_date'); //current
        });
        
        Schema::create('contacts', function (Blueprint $table) {
            $table->id('contact_id');
            $table->foreignId('user_sender_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('contact_user_id')->constrained('users')->cascadeOnDelete();
            $table->datetime('added_date'); //current
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friend_request');
        Schema::dropIfExists('contacts');
    }
};
