<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'password', 'email', 'fullname', 'type']; // Fillable attributes

    public function user()
    {
        // return $this->belongsTo(User::class, 'username', 'username');
    }
}
