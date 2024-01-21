@extends('layout.app')

@section('title', 'Home')

@section('content')
    <h1>Welcome to the Home Page</h1>

    <ul>
        <li><a href="{{ route('classes.index') }}">View Classes</a></li>
        <li><a href="{{ route('students.index') }}">View Students</a></li>
        {{-- <li><a href="{{ route('subjects.index') }}">View Subjects</a></li> --}}
    </ul>
@endsection
