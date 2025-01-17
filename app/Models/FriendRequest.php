<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FriendRequest extends Model
{
/** @use HasFactory<\Database\Factories\UserFactory> */
use HasFactory, Notifiable;

/**
 * The primary key associated with the table.
 *
 * @var string
 */
protected $primaryKey = 'request_id';

const CREATED_AT = 'request_date';
/**
 * The model's default values for attributes.
 *
 * @var array
 */
protected $attributes = [
    'state' => 'pending',
];


public function senderRequest(): BelongsTo
{
    return $this->belongsTo(User::class, 'user_sender_id');
}

public function receiverRequest(): BelongsTo
{
    return $this->belongsTo(User::class, 'contact_receiver_id');
}
}
