<?php

namespace App;

use App\Course;
use App\StudentsCourses;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;
class Student extends Model
{
    use Orderable;
    protected $hidden = ['pivot'];
    protected $fillable = ['first_name', 'last_name', 'email', 'birthday', 'notes'];
    
    public function courses() {
        return $this->belongsToMany('App\Course','students_courses',"student_id","course_id");//
    }
}
