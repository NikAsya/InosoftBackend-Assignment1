@extends('layout.app')

@section('title', 'Edit Class')

@section('content')
    <h1>Edit Class</h1>

    <form method="post" action="{{ route('classes.update', $class->id) }}">
        @csrf
        @method('PUT') <!-- Use the PUT method for update -->

        <label for="class_name">Class Name:</label>
        <input type="text" id="class_name" name="class_name" value="{{ $class->class_name }}" required>

        <button type="submit">Update Class</button>
    </form>

    <a href="{{ route('classes.index') }}">Back to Class List</a>
@endsection
