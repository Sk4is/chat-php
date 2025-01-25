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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('request_id');
            $table->foreignId('user_sender_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_receiver_id')->constrained('users')->cascadeOnDelete();
            $table->enum('state', ['pending', 'accepted', 'denied'])->default('pending');
            $table->datetime('request_date');
        });
        
        Schema::create('action_history', function (Blueprint $table) {
            $table->id('history_id');
            $table->datetime('action_date');
            $table->string('action_type', 255);
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('reaction_id')->constrained('reactions', 'reaction_id')->cascadeOnDelete();
            $table->foreignId('ban_id')->constrained('bans', 'ban_id')->cascadeOnDelete();
            $table->foreignId('message_id')->constrained('messages', 'message_id')->cascadeOnDelete();
            $table->foreignId('chat_id')->constrained('chats', 'chat_id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('action_history');
    }
};
