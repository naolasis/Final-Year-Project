<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'group_name',
        'project_title',
        'description',
        'advisor_id',
    ];

    public function advisor()
    {
        return $this->belongsTo(Advisor::class);
    }

    public function advisorRequests()
    {
        return $this->hasMany(AdvisorRequest::class);
    }
}
