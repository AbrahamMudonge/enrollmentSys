<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

   
    public function course()
    {
        return $this->belongsTo('App\Models\Courses', 'course_id', 'id');
    }
}
