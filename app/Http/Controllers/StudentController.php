<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        // return view('student.index', ['students' => $students]);
        return view('student.index');
    }

    public function show(Student $student){
        return view('student.show', ['student' => $student]);
    }

    // public function update(Request $request, Student $student)
    // {
    //     $data = $request->validate([
    //         'lastname' => 'required|string',
    //         'firstname' => 'required|string',
    //         'email' => 'nullable|email',
    //         'number' => 'nullable|string'
    //     ]);

    //     $student->fill($data);
    //     $student->save();

    //     return redirect()->route('student.show', $student);
    // }

    /*
    public function update(StudentRequest $request, Student $student)
    {
        $data = $request->validated();
        // la méthode fill est possible grâce à la variable fillable dans le model. 
        $student->fill($data);
        $student->save();

        return redirect()->route('student.show', $student);
    }
    */

}
