<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JoinRequest extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'status',
        //'group_id'
    ];
    
    public function sender()
    {
        return $this->belongsTo(Student::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Student::class, 'receiver_id');
    }
}
