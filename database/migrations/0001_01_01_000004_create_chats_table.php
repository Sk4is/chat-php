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

        Schema::create('members', function (Blueprint $table) {
            $table->id('member_id');
            $table->foreignId('chat_id')->constrained('chats', 'chat_id')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('role', ['moderator', 'member'])->default('member');
            $table->dateTime('entry_date');//current
        });
        
        Schema::create('bans', function (Blueprint $table) {
            $table->id('ban_id');
            //$table->foreignId('chat_id')->constrained('chats', 'chat_id')->cascadeOnDelete(); already on member fk chat_id
            $table->foreignId('banned_member_id')->constrained('members', 'member_id')->cascadeOnDelete();
            $table->foreignId('admin_id')->constrained('users');
            $table->enum('type', ['temporal', 'permanent']);
            $table->dateTime('start_date'); //current
            $table->dateTime('end_date')->nullable();
        });
        
        Schema::create('member_role', function (Blueprint $table) {
            $table->id('member_role_id');
            $table->foreignId('member_id')->constrained('members', 'member_id')->cascadeOnDelete();
            $table->foreignId('role_id')->constrained('roles', 'role_id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
        Schema::dropIfExists('members');
        Schema::dropIfExists('bans');
        Schema::dropIfExists('member_role');
    }
};
