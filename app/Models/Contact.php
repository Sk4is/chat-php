<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
 /** @use HasFactory<\Database\Factories\UserFactory> */
 use HasFactory, Notifiable;

 /**
  * The primary key associated with the table.
  *
  * @var string
  */
 protected $primaryKey = 'contact_id';

 const CREATED_AT = 'added_date';


 public function contactUser(): BelongsTo
 {
     return $this->belongsTo(User::class, 'user_sender_id');
 }

 public function contactFriend(): BelongsTo
 {
     return $this->belongsTo(User::class, 'contact_user_id');
 }

}
