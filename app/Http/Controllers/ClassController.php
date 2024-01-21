<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::all();
        return view('classes.index', compact('classes'));
    }

    //for returning in JSON format
    public function getAllClasses()
    {
        $classes = ClassModel::all();

        return response()->json([
            'classes' => $classes,
        ]);
    }

    public function create()
    {
        return view('classes.create');
    }

    //jsonstyle
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'class_name' => 'required|unique:class_models,class_name',
    //     ]);

    //     ClassModel::create($request->all());

    //     return redirect()->route('classes.index')->with('success', 'Class created successfully');
    // }

    //formdatastyle
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|unique:class_models,class_name',
        ]);

        $data = [
            'class_name' => $request->input('class_name'),
            // Add other fields as needed
        ];

        ClassModel::create($data);

        return redirect()->route('classes.index')->with('success', 'Class created successfully');
    }

    public function edit(ClassModel $class)
    {
        return view('classes.edit', compact('class'));
    }

    //HTML form function
    public function update(Request $request, ClassModel $class)
    {
        // Validate the form data
        $request->validate([
            'class_name' => 'required|string|max:255',
        ]);

        // Update the class
        $class->update([
            'class_name' => $request->input('class_name'),
            // Add other fields as needed
        ]);

        // Redirect back to the class list (For the html)
        return redirect()->route('classes.index')->with('success', 'Class updated successfully!');
    }

    //Postman endpointAPI
    public function updateClass(Request $request, $id)
    {
        $class = ClassModel::findOrFail($id);

        // Validate the JSON data
        $request->validate([
            'class_name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        // Update the class
        $class->update([
            'class_name' => $request->input('class_name'),
            // Add other fields as needed
        ]);

        // Return a JSON response with the updated class
        return response()->json([
            'message' => 'Class updated successfully!',
            'class' => $class,
        ]);
    }

    // public function showWithStudents($id)
    // {
    //     $class = ClassModel::findOrFail($id);
    //     $students = $class->students;

    //     return response()->json([
    //         'class' => $class,
    //         //'students' => $students,
    //     ]);
    // }

    public function showAllWithStudents()
    {
        $classes = ClassModel::with('students')->get();

        return response()->json([
            'classes' => $classes,
        ]);
    }




    // Add other methods as needed
}
