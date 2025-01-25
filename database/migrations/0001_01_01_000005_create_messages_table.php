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
        Schema::create('messages', function (Blueprint $table) {
            $table->id('message_id');
            $table->foreignId('chat_id')->constrained('chats', 'chat_id')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users');
            $table->text('content');
            $table->enum('type', ['text', 'image', 'video', 'audio'])->default('text');
            $table->enum('state', ['read', 'received', 'sent'])->default('sent');
            $table->timestamp('sent_date')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
        
        Schema::create('reactions', function (Blueprint $table) {
            $table->id('reaction_id');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('message_id')->constrained('messages', 'message_id')->cascadeOnDelete();
            $table->string('type', 50);
            $table->text('description');
            $table->dateTime('reaction_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('reactions');
    }
};
