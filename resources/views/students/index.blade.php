@extends('layout.app')

@section('title', 'Student List')

@section('content')
<h1>Student List</h1>

<a href="{{ url('/') }}">Go to Home</a>
<div style="text-align: right; margin-bottom: 10px; margin-right: 10px;">
    <a href="{{ route('api.students.showAllStudents') }}" target="_blank">View All Students (JSON)</a>
</div>
<!-- Form for filtering by class -->
<form method="POST" action="{{ route('students.filter') }}">
    @csrf
    <label for="classFilter">Filter by Class:</label>
    <select name="class" id="classFilter">
        <option value="">All Classes</option>
        <option value="Class 1">Class 1</option>
        <option value="Class 2">Class 2</option>
        <option value="Class 3">Class 3</option>
        <option value="Class 4">Class 4</option>
        <option value="Class 5">Class 5</option>
        <option value="Class 6">Class 6</option>
    </select>
    <button type="submit">Apply Filter</button>
</form>


<!-- Display the students in a table -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Class</th>
            <!-- Add more table headers as needed -->
            <th>Actions</th> <!-- Add a column for actions -->
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
            <td>{{ $student->studentClass->class_name }}</td>
            <!-- Add more table cells as needed -->
            <td><a href="{{ route('students.show', ['id' => $student->id]) }}">Show Details</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
