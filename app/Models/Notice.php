<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title',
        'content',
        'posted_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }


}

