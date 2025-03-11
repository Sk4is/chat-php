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

 protected $table = 'contacts';

 /**
  * The primary key associated with the table.
  *
  * @var string
  */
 protected $primaryKey = 'contact_id';

 public $timestamps = false;
 
 protected $fillable = ['user_sender_id', 'contact_user_id', 'added_date'];


 public function sender()
 {
     return $this->belongsTo(User::class, 'user_sender_id');
 }

 public function receiver()
 {
     return $this->belongsTo(User::class, 'contact_user_id');
 }

}
