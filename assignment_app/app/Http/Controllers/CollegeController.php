<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Student;

use Illuminate\Http\Request;

class CollegeController extends Controller
{
    //Display all colleges
    public function index() { 
        $colleges = College::orderBy('name')->get();

        return view('colleges.index', compact('colleges'));
    }

    //Create a new college
    public function create() {
        return view('colleges.create'); 
    }

    //Store the form data
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:colleges,name',
            'address' => 'required',
        ]);

        College::create($request->all());

        return redirect()->route('colleges.index')->with('message', 'College added successfully.'); 

    }

    //Display college detail
    public function show(string $id) {
        $college = College::find($id);

        return view('colleges.show', compact('college'));
     }


    //Display edit form
    public function edit(string $id) {
        $college = College::findOrFail($id);

        return view('colleges.edit', compact('college'));

     }


    //Update the college details from the edit form
    public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
    
        $college = College::find($id);
    
        $college->update($request->all());
    
        return redirect()->route('colleges.index')->with('message', 'College updated successfully.');
     }


    //Destroy the college with the id
    public function destroy(string $id) {
        $college = College::findO($id);

        $college->delete();

        return redirect()->route('colleges.index')->with('message', 'College deleted successfully.');
     }
}
