<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    protected $fillable = ['user_id', 'description']; // Removed 'group_id'

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'advisor_id');
    }

    public function advisorRequests()
    {
        return $this->hasMany(AdvisorRequest::class, 'advisor_id');
    }

    public function hasPendingAdvisorRequests()
    {
        return $this->advisorRequests()->where('advisor_status', 'pending')->exists();
    }

    public function hasRejectedAdvisorRequests()
    {
        return $this->advisorRequests()->where('advisor_status', 'rejected')->exists();
    }

    public function hasAcceptedAdvisorRequests()
    {
        return $this->advisorRequests()->where('advisor_status', 'accepted')->exists();
    }
}
