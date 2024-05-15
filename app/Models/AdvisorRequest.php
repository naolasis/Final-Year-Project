<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvisorRequest extends Model
{
    protected $fillable = [
        'group_id',
        'advisor_id',
        'advisor_status',
        'committee_status',
        'reject_reason',
    ];

    public function sender_group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function receiver_advisor()
    {
        return $this->belongsTo(Advisor::class, 'advisor_id');
    }
}
