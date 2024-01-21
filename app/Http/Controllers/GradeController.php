<?php

namespace App\Http\Controllers;

use App\Models\GradeModel;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = GradeModel::all();
        return view('grades.index', compact('grades'));
    }

    public function show($id)
    {
        $grade = GradeModel::find($id);
        return view('grades.show', compact('grade'));
    }

    public function store(Request $request)
    {
        // Implement your logic to store a new grade
    }

    public function update(Request $request, $id)
    {
        // Implement your logic to update a grade
    }

    // Add other methods as needed
}
