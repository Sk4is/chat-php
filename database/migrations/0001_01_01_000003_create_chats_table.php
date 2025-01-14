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
        Schema::create('chats', function (Blueprint $table) {
            $table->id('chat_id');
            $table->foreignId('owner_id')->constrained('users');
            $table->string('name');
            $table->enum('type', ['public', 'private'])->default('public');
            $table->text('description');
            $table->timestamp('creation_date')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id('message_id');
            $table->foreignId('chat_id')->constrained('chats', 'chat_id')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users');
            $table->text('content');
            $table->enum('type', ['text', 'image', 'video', 'audio'])->default('text');
            $table->enum('state', ['read', 'received', 'sent'])->default('sent');
            $table->timestamp('sent_date')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id('member_id');
            $table->foreignId('chat_id')->constrained('chats', 'chat_id')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('role', ['moderator', 'member'])->default('member');
            $table->dateTime('entry_date');
            $table->dateTime('departure_date'); //revisar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('members');
    }
};
