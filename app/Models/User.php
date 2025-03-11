<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function achievement()
    {
        return $this->belongsToMany(Achievement::class, 'user_achievement', 'user_id', 'achievement_id')
                    ->using(UserAchievement::class)->withPivot('obtained_at');
    }

    //Mejor añadir la función a User para reutilizarla, y permite filtrar los resultados
    public function allContacts()
    {
        return Contact::where('user_sender_id', $this->id)
            ->orWhere('contact_user_id', $this->id)
            ->get()
            ->map(function ($contact) {
                return $contact->user_sender_id == $this->id
                    ? $contact->contactedFriend
                    : $contact->senderFriend;
            });
    }

    public function senderFriend(): HasMany
    {
        return $this->hasMany(Contact::class, 'user_sender_id');
    }

    public function contactedFriend(): HasMany
    {
        return $this->hasMany(Contact::class, 'contact_user_id');
    }

    public function allFriends()
    {
        $friendIds = Contact::where('user_sender_id', $this->id)
            ->pluck('contact_user_id')
            ->merge(
                Contact::where('contact_user_id', $this->id)
                    ->pluck('user_sender_id')
            )
            ->unique();
    
        return User::whereIn('id', $friendIds)->get();
    }

    public function allDateFriends()
    {
        return User::select('users.*', 'contacts.added_date')
        ->join('contacts', function ($join) {
            $join->on('users.id', '=', 'contacts.user_sender_id')
                ->orOn('users.id', '=', 'contacts.contact_user_id');
        })
        ->where(function ($query) {
            $query->where('contacts.user_sender_id', $this->id)
                  ->orWhere('contacts.contact_user_id', $this->id);
        })
        ->where('users.id', '!=', $this->id)
        ->distinct()
        ->get();
    }
    
}
