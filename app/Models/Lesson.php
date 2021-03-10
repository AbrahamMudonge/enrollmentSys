<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_name',
        'course_id',
        'created_by'
        
    ];

    public function courses()
    {
        return $this->belongsTo('App\Models\Courses', 'course_id', 'id');
    }

}
