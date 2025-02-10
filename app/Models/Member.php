<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
     use HasFactory, Notifiable;

     /**
      * The primary key associated with the table.
      *
      * @var string
      */
     protected $primaryKey = 'member_id';
 
     const CREATED_AT = 'entry_date';
 
     /**
      * The model's default values for attributes.
      *
      * @var array
      */
     protected $attributes = [
         'role' => 'member',
     ];
 
     /**
      * The attributes that are mass assignable.
      *
      * @var list<string>
      */
     protected $fillable = [
         'name',
         'description',
         'type',
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
