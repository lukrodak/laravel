<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
       $course = Course::all();
        
        return response()->
            json($course,200);
    }

    public function show(Course $course)
    {
        $course->load("students");
        return response()->
            json($course,200);
    }

    public function update(Course $course, StoreCourseRequest $request)
    {
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();

        return response()->
            json($course, 200);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response(null,204);
    }

    public function store(StoreCourseRequest $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;       
        $course->save();

        return response()->
            json($course, 201);
    }
}
