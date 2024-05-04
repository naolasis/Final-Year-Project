<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'role', 
        'password',
        'fullname',
        'email',
        'image',
    ];

    // public function committees()
    // {
    //     return $this->hasMany(Committee::class);
    // }

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

    
    // Added for role checking

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isCommitteeHead(): bool
    {
        return $this->role === 'committee_head';
    }

    public function isCommitteeMember(): bool
    {
        return $this->role === 'committee_member';
    }

    public function isAdvisor(): bool
    {
        return $this->role === 'advisor';
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }
}
