@extends('layout.app')

@section('title', 'Create New Class')

@section('content')
    <h1>Create New Class</h1>

    <form method="post" action="{{ route('classes.store') }}">
        @csrf
        <label for="class_name">Class Name:</label>
        <input type="text" id="class_name" name="class_name" required>

        <button type="submit">Add Class</button>
    </form>

    <a href="{{ route('classes.index') }}">Back to Class List</a>
@endsection
