<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();
        return Inertia::render('Show',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Student $student)
    {
        //
        $request->validate([
            'fname'=>'required|string|max:255',
            'lname'=>'required|string|max:255',
        ]);
        $student->create([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return Inertia::render('Edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        $request->validate([
            'fname'=>'required|string|max:255',
            'lname'=>'required|string|max:255',
        ]);
        $student->update([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
        ]);

        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //

        $student->delete();
    }
}
