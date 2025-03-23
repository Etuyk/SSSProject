<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index() {
        // List all students, optionally filter by college
    }

    
    public function create() {
        // Show form to create student
    }

    
    public function store(Request $request) {
        // Save new student
    }

    
    public function show(string $id) {
        // Show student details
    }

    
    public function edit(string $id) {
        // Show form to edit student
    }

   
    public function update(Request $request, string $id) {
        // Update student
    }

    
    public function destroy(string $id) {
        // Delete student
    }
}
