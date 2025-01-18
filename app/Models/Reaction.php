<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reaction extends Model
{
/** @use HasFactory<\Database\Factories\UserFactory> */
use HasFactory, Notifiable;

/**
 * The primary key associated with the table.
 *
 * @var string
 */
protected $primaryKey = 'reaction_id';

const CREATED_AT = 'reaction_date';

/**
* The attributes that are mass assignable.
*
* @var list<string>
*/
protected $fillable = [
    'member_id',
    'message_id',
    'type',
    'description'
];

public function message(): BelongsTo
{
    return $this->belongsTo(Message::class);
}
public function member(): BelongsTo
{
    return $this->belongsTo(Member::class);
}


}
