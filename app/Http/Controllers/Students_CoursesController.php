<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\StudentsCourses;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsCoursesRequest;
use Illuminate\Support\Facades\DB;

class Students_CoursesController extends Controller
{
    public function index()
    {
        $students_courses =  DB::table('students_courses')->get();
        
        return response()->
            json($students_courses,201);
    }
    
    public function store(StoreStudentsCoursesRequest $request)
    {
        $data = new StudentsCourses;
        $data->student_id = $request->student_id;
        $data->course_id = $request->course_id;
          
        $data->save();
        return response()->
                json($data, 201);
    }

}
