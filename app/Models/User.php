<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = ['is_admin'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->BelongsToMany(Role::class);
    }


    protected function fullname(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->attributes['last_name'] . ' ' . $this->attributes['first_name'],
        );
    }
    protected function username(): Attribute
    {
        return Attribute::make(
            // set: fn ($value) => strtolower($value),
            set: fn ($value) => Str::slug($value),
        );
    }
}
