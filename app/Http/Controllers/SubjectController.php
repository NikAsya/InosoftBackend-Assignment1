<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;

class SubjectController extends Controller
{


    public function index()
    {
        $subjects = SubjectModel::all();
        return view('subjects.index', compact('subjects'));
    }

    public function show($id)
    {
        $subject = SubjectModel::find($id);
        return view('subjects.show', compact('subject'));
    }

    public function store(Request $request)
    {
        // Implement your logic to store a new subject
    }

    public function update(Request $request, $id)
    {
        // Implement your logic to update a subject
    }

    // Add other methods as needed
}
