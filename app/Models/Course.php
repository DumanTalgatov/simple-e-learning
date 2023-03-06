<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'thumbnail', 'user_id', 'authorname', 'description'
    ];

    protected $table ='courses';

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_course', 'course_id');
    }

    public function enrollments()
    {
        return $this->hasMany('App\Models\Enrollment');
    }

    public function userCourse()
    {
        return $this->hasMany('App\Models\UserCourse');
    }
}
