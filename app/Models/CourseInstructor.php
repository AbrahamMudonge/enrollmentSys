<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInstructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'instructor_name'
    ];

    public function courses()
    {
        return $this->belongsTo(Courses::class,'course_id');
    }
}
