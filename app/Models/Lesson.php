<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Courses;

class Lesson extends Model
{
    use HasFactory;


    public function courses()
    {
        return $this->belongsTo('App\Models\Courses', 'course_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
