<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    protected $fillable = ['user_id']; // Fillable attributes

    public function user()
    {
        // return $this->belongsTo(User::class, 'username', 'username');
    }
}
