<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class UserAchievement extends Model
{
  /** @use HasFactory<\Database\Factories\UserFactory> */
  use HasFactory, Notifiable;

  /**
   * The primary key associated with the table.
   *
   * @var string
   */
  protected $primaryKey = 'achievement_id';

  const CREATED_AT = 'obtained_date';


  public function achievement(): BelongsTo
  {
      return $this->belongsTo(Achievement::class);
  }

  public function user(): BelongsTo
  {
      return $this->belongsTo(User::class);
  }
}
