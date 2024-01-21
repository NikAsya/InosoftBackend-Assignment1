@extends('layout.app')

@section('title', 'Student Details')

@section('content')
<h1>Student Details</h1>
<a href="{{ route('students.index') }}">Back to Student List</a>
<p><strong>ID:</strong> {{ $student->id }}</p>
<p><strong>Name:</strong> {{ $student->first_name }} {{ $student->last_name }}</p>
<p><strong>Class:</strong> {{ $student->studentClass->class_name }}</p>

<h2>Grades</h2>
<table>
    <thead>
        <tr>
            <th>Subject</th>
            <th>Exercises</th>
            <th>Weekly Exams</th>
            <th>Mid-Semester Exam</th>
            <th>End-Semester Exam</th>
            <!-- Add any other grade-related columns -->
        </tr>
    </thead>
    <tbody>
        @if ($student->grades)
        @foreach ($student->grades as $grade)
        <tr>
            <td>{{ $grade->subject }}</td>
            <td>{{ $grade->exercises }}</td>
            <td>{{ $grade->weekly_exams }}</td>
            <td>{{ $grade->mid_semester_exam }}</td>
            <td>{{ $grade->end_semester_exam }}</td>
            <td>
                <a href="{{ route('api.students.calculateAverageGrade', ['studentId' => $student->id, 'subject' => $grade->subject]) }}" target="_blank">
                    Calculate Average for {{ $grade->subject }}
                </a>
            </td>
            <!-- Add any other grade-related columns -->
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5">No grades available for this student.</td>
        </tr>
        @endif
    </tbody>
</table>
<br>
<!-- Button to display student and grades data in JSON -->
    <a href="{{ route('api.students.showWithGrades', $student->id) }}" target="_blank">Show Student Detail Data as (JSON)</a>
    <br>
    <a href="{{ route('api.students.showCalculatedAverages', $student->id) }}" target="_blank">Show Student Calculated Averages for All Subjects as (JSON)</a>
@endsection
