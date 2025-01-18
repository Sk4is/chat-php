<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model
{
/** @use HasFactory<\Database\Factories\UserFactory> */
use HasFactory, Notifiable;

/**
 * The primary key associated with the table.
 *
 * @var string
 */
protected $primaryKey = 'permission_id';

/**
* The attributes that are mass assignable.
*
* @var list<string>
*/
protected $fillable = [
    'name',
    'description'
];

public function roles()
{
    return $this->belongsToMany(Role::class, 'role_permission', 'permission_id', 'role_id');
}

}
