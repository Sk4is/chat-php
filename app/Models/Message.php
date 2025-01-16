<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
     use HasFactory, Notifiable;

     /**
      * The primary key associated with the table.
      *
      * @var string
      */
     protected $primaryKey = 'message_id';
 
     const CREATED_AT = 'sent_date';
 
     /**
      * The model's default values for attributes.
      *
      * @var array
      */
     protected $attributes = [
         'type' => 'text',
     ];
 
     /**
      * The attributes that are mass assignable.
      *
      * @var list<string>
      */
     protected $fillable = [
         'name',
         'description',
         'content',
     ];
 
     /**
      * The attributes that should be hidden for serialization.
      *
      * @var list<string>
      */
     protected $hidden = [
     ];
 
     /**
      * Get the attributes that should be cast.
      *
      * @return array<string, string>
      */
     protected function casts(): array
     {
         return [
            'state' => 'sent',
         ];
     }
 
     public function chat(): BelongsTo
     {
         return $this->belongsTo(Chat::class);
     }

     public function user(): BelongsTo
     {
         return $this->belongsTo(User::class);
     }


}
