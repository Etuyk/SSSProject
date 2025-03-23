<?php

namespace App\Http\Controllers;
use App\Models\College;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index() {
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        return view('students.index', compact('students', 'colleges'));

    }

    
    public function create() {
        $student = new Student();
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('Select a College', '');
    
        return view('students.create', compact('student', 'colleges'));
    }

    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id'
        ]);
    
        Student::create($request->all());
    
        return redirect()->route('students.index')->with('message', 'Student created successfully.');
    }

    
    public function show(string $id) {

        $student = Student::find($id);

        return view('students.show', compact('student'));
        
    }

    
    public function edit(string $id){

        $student = Student::findOrFail($id);

        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('Select a College', '');

        return view('students.edit', compact('student', 'colleges'));
    }

   
    public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id'
        ]);

        $student = Student::find($id);

        $student->update($request->all());

        return redirect()->route('students.index')->with('message', 'Student updated successfully.');
    }

    
    public function destroy(string $id) {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('students.index')->with('message', 'Student deleted successfully.');
    }
}
