<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActionHistory extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'history_id';

    const CREATED_AT = 'action_date';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'action_type',
        'user_id',
        'reaction_id',
        'ban_id',
        'message_id',
        'chat_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function reaction(): BelongsTo
    {
        return $this->belongsTo(Reaction::class);
    }
    public function ban(): BelongsTo
    {
        return $this->belongsTo(Ban::class);
    }
    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }
    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }
}
