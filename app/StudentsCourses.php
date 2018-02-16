<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

class StudentsCourses extends Model
{
    protected $fillable = ['student_id','course_id'];
    use Orderable;

}
