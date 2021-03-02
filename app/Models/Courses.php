<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $fillable =[
        'courseName',
        'price',
        'startDate',
        'endDate',
        'description',
        'create_by',
    ];

    public function course_instructor()
    {
        return $this->hasOne(CourseInstructor::class);
    }
}
