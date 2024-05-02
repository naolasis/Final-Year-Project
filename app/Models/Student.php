<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['username', 'student_attribute1', 'student_attribute2']; // Fillable attributes

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
