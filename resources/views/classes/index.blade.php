@extends('layout.app')

@section('title', 'Class List')

@section('content')
    <h1>Class List</h1>

    <a href="{{ url('/') }}">Go to Home</a>

    <div style="text-align: right; margin-bottom: 10px; margin-right: 10px;">
        <a href="{{ url('/api/classes-with-students') }}" target="_blank">View All Classes with Students with (JSON)</a>
    </div>


    <table id="classTable">
        <thead>
            <tr>
                <th>ID</th>
                <th class="sortable" data-column="class_name">Class Name <span class="sort-indicator">&#9650;</span></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->class_name }}</td>
                    <td>
                        <a href="{{ route('classes.edit', $class->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('classes.create') }}">Add New Class</a>

    <script>
        $(document).ready(function () {
            // Make the table sortable by class name
            $('.sortable').on('click', function () {
                var column = $(this).data('column');
                var order = $(this).hasClass('asc') ? 'desc' : 'asc';

                // Update the column header class for styling and indicator
                $('.sortable').removeClass('asc desc');
                $(this).addClass(order).find('.sort-indicator').html(order === 'asc' ? '&#9650;' : '&#9660;');

                // Sort the table rows based on the selected column
                var index = $(this).index();
                var sortedRows = $('#classTable tbody tr').sort(function (a, b) {
                    var aValue = $(a).find('td:eq(' + index + ')').text();
                    var bValue = $(b).find('td:eq(' + index + ')').text();
                    return (order === 'asc') ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
                });

                // Update the table with sorted rows
                $('#classTable tbody').html(sortedRows);
            });
        });
    </script>
@endsection
