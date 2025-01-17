<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemberRole extends Pivot
{
/** @use HasFactory<\Database\Factories\UserFactory> */
use HasFactory, Notifiable;

/**
 * The primary key associated with the table.
 *
 * @var string
 */
protected $primaryKey = 'member_roles_id';

public function member(): BelongsTo
{
    return $this->belongsTo(Member::class, 'member_id');
}


}
