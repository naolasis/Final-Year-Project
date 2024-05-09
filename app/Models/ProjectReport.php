<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectReport extends Model
{
    protected $fillable = ['file_name', 'file_path', 'group_id', 'report_type'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
