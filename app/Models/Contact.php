<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Contact extends Pivot
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


 public function senderFriend()
 {
    return $this->belongsToMany(User::class, 'contacts', 'user_sender_id', 'contact_user_id');
 }

 public function contactedFriend(){
    return $this->belongsToMany(User::class, 'contacts', 'contact_user_id', 'user_sender_id');
 }

 public function allFriends()
 {
     return $this->senderFriend()->union($this->contactedFriend());
 }

}
