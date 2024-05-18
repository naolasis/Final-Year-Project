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


// forum related

    public function users() {
        return $this->belongsToMany(User::class);
    }
    
    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function advisor()
    {
        return $this->belongsTo(Advisor::class, 'advisor_id');
    }

    public function advisorRequests()
    {
        return $this->hasMany(AdvisorRequest::class);
    }
}
