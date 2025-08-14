@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Timetable Entry</h1>
    <a href="{{ route('teacher.timetable.index') }}" class="btn btn-secondary mb-3">Back to Teachers</a>

    <form action="{{ route('teacher.timetable.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="class_subject_id" class="form-label">Class & Subject</label>
            <select name="class_subject_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($classSubjects as $cs)
                    <option value="{{ $cs->id }}">
                        {{ $cs->class?->name ?? '' }} - {{ $cs->subject?->name ?? '' }} ({{ $cs->teacher?->first_name }} {{ $cs->teacher?->last_name }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="bell_schedule_id" class="form-label">Period</label>
            <select name="bell_schedule_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($bellSchedules as $schedule)
                    <option value="{{ $schedule->id }}">{{ $schedule->name }} ({{ $schedule->start_time }} - {{ $schedule->end_time }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="day" class="form-label">Day</label>
            <select name="day" class="form-control" required>
                @foreach($daysOfWeek as $day)
                    <option value="{{ $day }}">{{ $day }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="room_id" class="form-label">Room</label>
            <select name="room_id" class="form-control">
                <option value="">Select Room</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection

