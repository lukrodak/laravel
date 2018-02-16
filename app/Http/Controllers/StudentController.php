<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentsCourses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class StudentController extends Controller
{
    public function index()
    {
       $students = Student::all(); 
        return response()->
            json($students,200);
    }

    public function show(Student $student)
    {
        $student->load("courses");

        return response()->
            json($student,200);
    }


    public function update(Student $student, StoreStudentRequest $request)
    {
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;        
        $student->birthday = $request->birthday;
        $student->notes = $request->notes;
        $student->save();

        return response()->
            json($student,200);
    }
    public function destroy($id)
    {
        $student= Student::find($id);
        if (!$student) {
            return response("Invalid id",400);
        }        
        $student->delete();

        return response(null,204);

    }

    public function store(StoreStudentRequest $request)
    {
        $student = new Student;

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        
        $student->birthday = $request->birthday;
        $student->notes = $request->notes;
        $student->save();

        return response()->
            json($student, 201);
    }
}
