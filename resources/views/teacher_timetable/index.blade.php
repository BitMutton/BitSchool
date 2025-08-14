@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Teachers</h1>
    <a href="{{ route('teacher.timetable.create') }}" class="btn btn-primary mb-3">Add Timetable Entry</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>View Timetable</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td><a href="{{ route('teacher.timetable.show', $teacher->id) }}" class="btn btn-info">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
s
