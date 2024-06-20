<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Formation;
use App\Models\Group;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        // map automatiquement les droits de lecture écriture en fonction des rôles users.
        $this->authorizeResource(Course::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formations = Formation::orderBy('name', 'asc')->get();
        return view('admin.course.create', ['formations' => $formations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $data = $request->validated();
        $course = Course::create($data);
        
        return redirect()->route('admin.course.show', ['course' => $course]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin.course.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $formations = Formation::orderBy('name','asc')->get();
        return view('admin.course.edit', ['course' => $course, 'formations' => $formations]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        $data = $request->validated();
        $course->fill($data);
        $course->save();
        return redirect()->route('admin.course.show', $course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.course.index');
    }
}
