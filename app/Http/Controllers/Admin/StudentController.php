<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Formation;
use App\Models\Group;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize("viewAny", Student::class);
        $students = Student::all();
        return view('admin.student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Student::class);
        $formations = Formation::orderBy('name','asc')->get();
        $groups = Group::orderBy('name','asc')->get();
        return view('admin.student.create', ['formations' => $formations, 'groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $this->authorize('create', Student::class);
        $data = $request->validated();
        

        $student = Student::create($data);
        $student->groups()->attach($data['groups'] ?? null);
        return redirect()->route('admin.student.show', $student);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $this->authorize("view", $student);
        return view('admin.student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $this->authorize('update', $student);
        $formations = Formation::orderBy("name","asc")->get();
        $groups = Group::orderBy('name','asc')->get();
        return view('admin.student.edit', ['student' => $student, "formations" => $formations, 'groups' => $groups]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student)
    {
        $this->authorize('update', $student);
        $data = $request->validated();
        // la méthode fill est possible grâce à la variable fillable dans le model. 
        $student->fill($data);
        $student->save();

        $student->groups()->sync($data['groups'] ?? null);

        return redirect()->route('admin.student.show', $student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $this->authorize('delete', $student);
        $student->delete();
        return redirect()->route('admin.student.index');
    }
}
