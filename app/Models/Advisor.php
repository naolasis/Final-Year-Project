<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    protected $fillable = ['user_id', 'description']; // Fillable attributes

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function advisorRequests()
    {
        return $this->hasMany(AdvisorRequest::class);
    }
}
