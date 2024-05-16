<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['user_id', 'group_id']; // Fillable attributes

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function hasPendingJoinRequests()
    {
        return $this->receivedJoinRequests()->where('status', 'pending')->exists();
    }

    public function hasRejectedJoinRequests()
    {
        return $this->receivedJoinRequests()->where('status', 'rejected')->exists();
    }

    public function hasAcceptedJoinRequests()
    {
        return $this->receivedJoinRequests()->where('status', 'accepted')->exists();
    }

    // Define a relationship to retrieve join requests received by the student.
    public function receivedJoinRequests()
    {
        return $this->hasMany(JoinRequest::class, 'receiver_id');
    }
}
